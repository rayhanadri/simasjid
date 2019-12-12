<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usulan;
use App\Pembelian;
use App\Inventaris;
use Auth;

class DasborAsetController extends Controller
{
    //
    public function dasbor()
    {
        //user terotentikasi
        $anggota = Auth::user();

        $jml_usulan_menunggu = Usulan::get()->where('status_usulan', '=', 'Menunggu Keputusan')->count();
        $jml_usulan_disetujui = Usulan::get()->where('status_usulan', '=', 'Disetujui')->count();
        $jml_usulan_ditolak = Usulan::get()->where('status_usulan', '=', 'Ditolak')->count();
        //retval
        return view('aset.dasbor', ['jml_usulan_menunggu' => $jml_usulan_menunggu, 'jml_usulan_disetujui' => $jml_usulan_disetujui, 'jml_usulan_ditolak' => $jml_usulan_ditolak, 'anggota' => $anggota]);
    }
}
