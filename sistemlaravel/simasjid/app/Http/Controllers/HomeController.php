<?php

namespace App\Http\Controllers;
// use App\Anggota;
// use Illuminate\Http\Request;
use Auth;
use App\Anggota_Jabatan;
use App\Anggota_Status;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //buka index. Ambil data user terotentikasi, kemudian passing ke view home
        $anggota = Auth::user();
        $anggota->status = Anggota_Status::find($anggota->id_status)->status;
        $anggota->jabatan = Anggota_Jabatan::find($anggota->id_jabatan)->jabatan;
        return view('home', ['anggota' => $anggota]);
    }
}
