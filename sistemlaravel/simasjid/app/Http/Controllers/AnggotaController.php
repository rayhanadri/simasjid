<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;

class AnggotaController extends Controller
{
    
    public function login()
    {
        $anggota = new Anggota();
        // $anggota->hello();
        $dataAnggota = $anggota->getDataAnggota();
        // // $anggota = Anggota::where('username', 'ketua')->where('password', 'password')->first();
        dd($dataAnggota->namaAnggota);
        //return view('LoginPage', compact('dataAnggota'));
    }

    public function index()
    {
        return view('LoginPage');
    }
}
