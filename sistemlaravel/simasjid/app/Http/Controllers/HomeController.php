<?php

namespace App\Http\Controllers;
// use App\Anggota;
// use Illuminate\Http\Request;
use Auth;
use App\Transformer;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //buka index. Ambil data user terotentikasi, kemudian passing ke view home
        $user = Auth::user();
        $user->jabatan = Transformer::jabatan($user->id_jabatan);
        return view('home',['user' => $user]);
    }
}
