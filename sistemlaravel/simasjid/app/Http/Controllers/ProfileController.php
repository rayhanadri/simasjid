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
        $user->jabatan = Transformer::jabatan($user->id_jabatan);
        return view('profile',['user' => $user]);
    }
}
