<?php

namespace App\Http\Controllers;
use App\Transformer\Transformer;
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
        $anggota->jabatan = Transformer::t_jabatan($anggota->id_jabatan);
        $anggota->status = Transformer::t_status($anggota->id_status);
        return view('home', ['anggota' => $anggota]);
    }
}
