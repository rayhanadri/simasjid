<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Anggota;
use Auth;
use App\Anggota_Jabatan;
use App\Anggota_Status;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        //semua user, composite object
        $list_anggota = Anggota::get()->where('id_status', '!=', 3);
        //user terotentikasi
        $anggota = Auth::user();
        //id ke nilai
        foreach ($list_anggota as $anggota_dalam_list) {
            $anggota_dalam_list->status = Anggota_Status::find($anggota_dalam_list->id_status)->status;
            $anggota_dalam_list->jabatan = Anggota_Jabatan::find($anggota_dalam_list->id_jabatan)->jabatan;
        }
        //retval
        return view('anggotaTerdaftar', ['list_anggota' => $list_anggota, 'anggota' => $anggota]);
    }

    public function getDetail($id)
    {
        $detail_anggota = Anggota::get()->where('id', $id)->first();
        $detail_anggota->status = Anggota_Status::find($detail_anggota->id_status)->status;
        $detail_anggota->jabatan = Anggota_Jabatan::find($detail_anggota->id_jabatan)->jabatan;

        return $detail_anggota;
    }

    public function getUnverifiedList()
    {
        //semua user, composite object
        $list_anggota = Anggota::get()->where('id_status', '=', 3);
        //user terotentikasi
        $anggota = Auth::user();
        //id ke nilai
        foreach ($list_anggota as $anggota_dalam_list) {
            $anggota_dalam_list->status = Anggota_Status::find($anggota_dalam_list->id_status)->status;
            $anggota_dalam_list->jabatan = Anggota_Jabatan::find($anggota_dalam_list->id_jabatan)->jabatan;
        }
        //retval
        return view('anggotaBlmVerifikasi', ['list_anggota' => $list_anggota, 'anggota' => $anggota]);
    }

    public function tolak(Request $request)
    {
        $deleted_anggota = Anggota::get()->where('id', $request->anggotaId)->first();
        $deleted_anggota->delete();

        return redirect(route('anggotaBlmVerifikasi'));
    }

    public function verif(Request $request)
    {
        $detail_anggota = Anggota::get()->where('id', $request->anggotaId)->first();
        $detail_anggota->id_status = 1;
        $detail_anggota->save();
        return redirect(route('anggotaBlmVerifikasi'));
    }
}
