<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Transformer\Transformer;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //buka index. Ambil data user terotentikasi, kemudian passing ke view home
        $user = Auth::user();
        //transform dari db id_jabatan (angka) ke string, misal 1 jadi Ketua Takmir
        $user->jabatan = Transformer::jabatan($user->id_jabatan);
        //transform dari db aktif (angka) ke string status, misal 0 jadi Non-Aktif
        $user->status = Transformer::status($user->aktif);
        return view('profile', ['user' => $user]);
    }
}
