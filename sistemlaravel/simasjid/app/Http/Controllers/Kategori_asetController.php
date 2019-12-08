<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori_aset;

class Kategori_asetController extends Controller
{
    //
    public function index()
    {
        //semua user, composite object
        $list_anggota = Anggota::get()->where('id_status', '!=', 3);
        //user terotentikasi
        $anggota = Auth::user();
        //id ke nilai
        foreach ($list_anggota as $anggota_dalam_list) {
            $anggota_dalam_list->status = Transformer::t_status($anggota_dalam_list->id_status);
            $anggota_dalam_list->jabatan = Transformer::t_jabatan($anggota_dalam_list->id_jabatan);
        }

        //list kategori aset
        $kategori_aset = Kategori_aset::get();

        //retval
        return view('aset.usulan', ['list_anggota' => $list_anggota, 'anggota' => $anggota, 'kategori_aset' => $kategori_aset]);
    }

    public function get($id_jenis)
    {
        //list kategori aset
        $kategori_aset = Kategori_aset::get()->where("id_jenis", $id_jenis)
            ->pluck("nama", "id");
        return response()->json($kategori_aset);
    }
}
