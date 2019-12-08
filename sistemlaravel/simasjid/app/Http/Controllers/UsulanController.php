<?php

namespace App\Http\Controllers;

use App\Kategori_aset;
use App\Usulan;
use App\Pengelola_aset;
use App\Transformer\Transformer;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsulanController extends Controller
{
    public function index()
    {
        //list pengelola
        $obj_list_pengelola = Pengelola_aset::get();
        $arr_list_pengelola = [];
        foreach ($obj_list_pengelola as $pengelola) {
            $arr_list_pengelola[] = $pengelola->id_anggota;
        }

        //tambahkan jenis aset dan kategori ke list
        $list_usulan = Usulan::get()->sortByDesc('created_at');

        //transform kode jenis aset ke string
        foreach ($list_usulan as $usulan_dalam_list) {
            $usulan_dalam_list->jenis_aset;
            $usulan_dalam_list->kategori;
        }

        //user terotentikasi
        $anggota = Auth::user();

        //retval
        return view('aset.usulan', ['list_usulan' => $list_usulan, 'list_pengelola' => $arr_list_pengelola, 'anggota' => $anggota]);
    }
    
    public function create(Request $request)
    {
        $usulan = new Usulan;
        $usulan->nama = $request->nama;
        $usulan->id_jenis = $request->jenis_aset;
        $usulan->id_kategori = $request->id_kategori;
        $usulan->id_pengusul = $request->id_pengusul;
        $usulan->jumlah = $request->jumlah;
        $usulan->harga = $request->harga;
        $usulan->status_usulan = "Menunggu Keputusan";
        $usulan->created_at = now();
        $usulan->updated_at = now();
        $usulan->save();
        return redirect(route('usulanTerdaftar'));
    }

    public function update(Request $request)
    {
        $usulan = Usulan::get()->where("id", '=', $request->id)->first();
        $usulan->id_pengelola = $request->id_pengelola;
        $usulan->status_usulan = $request->keputusan;
        $usulan->updated_at = now();
        $usulan->save();
        return redirect(route('usulanTerdaftar'));
    }
    public function edit(Request $request)
    {
        $usulan = Usulan::get()->where("id", '=', $request->usulanId)->first();
        $usulan->id_pengelola = $request->id_pengelola;
        $usulan->nama = $request->editNama;
        $usulan->id_jenis = $request->editJenis;
        $usulan->id_kategori = $request->editKategori;
        $usulan->jumlah = $request->editJumlah;
        $usulan->harga = $request->editHarga;
        $usulan->status_usulan = $request->editStatus;
        $usulan->updated_at = now();
        $usulan->save();
        return redirect(route('usulanTerdaftar'));
    }

    public function delete(Request $request)
    {
        $usulan = Usulan::get()->where("id", '=', $request->usulanId)->first();
        $usulan->delete();
        return redirect(route('usulanTerdaftar'));
    }

    public function getDetail($id)
    {
        $detail_usulan = Usulan::get()->where('id', '=', $id)->first();
        $detail_usulan->jenis_aset;
        $detail_usulan->kategori;
        $detail_usulan->pengusul;
        $detail_usulan->pengelola;
        return $detail_usulan;
    }
}
