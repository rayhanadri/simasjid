<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Anggota;
use Auth;
use App\Anggota_Jabatan;
use App\Anggota_Status;

class AnggotaController extends Controller
{
    public function index()
    {
        //semua user, composite object
        $list_anggota = Anggota::get()->where('id_status', '!=' , 3);
        //user terotentikasi
        $anggota = Auth::user();
        //id ke nilai
        foreach ($list_anggota as $anggota) {
            $anggota->status = Anggota_Status::find($anggota->id_status)->status;
            $anggota->jabatan = Anggota_Jabatan::find($anggota->id_jabatan)->jabatan;
        }
        //retval
        return view('anggotaTerdaftar', ['list_anggota' => $list_anggota, 'user' => $anggota]);
    }
}
