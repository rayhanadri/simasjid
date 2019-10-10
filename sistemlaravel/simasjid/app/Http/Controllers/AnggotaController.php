<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Anggota;
use Auth;
use App\Transformer;

class AnggotaController extends Controller
{
    public function index()
    {
        //semua user, composite object
        $list_anggota = Anggota::all();
        //user terotentikasi
        $user = Auth::user();
        //transform id ke string
        foreach ($list_anggota as $anggota) {
            $anggota->jabatan = Transformer::jabatan($anggota->id_jabatan);
            $anggota->status = Transformer::status($anggota->aktif);
        }
        //retval
        return view('anggotaTerdaftar', ['list_anggota' => $list_anggota, 'user' => $user]);
    }
}
