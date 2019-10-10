<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use Auth;
use App\Transformer;

class AnggotaController extends Controller
{
    public function index()
    {
        $list_anggota = Anggota::all();
        $user = Auth::user();
        $list_anggota->put('jabatan', 'ketua');
        $list_anggota->put('status', 'aktif');
        return view('anggotaTerdaftar', ['list_anggota' => $list_anggota, 'user' => $user]);
    }
}
