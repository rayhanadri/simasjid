<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Anggota_Status;
use App\Anggota_Jabatan;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadFoto(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_profil';
        $user = Auth::user();
        $filebaru = $user->username . '.' . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $filebaru);
        $user->link_foto = $tujuan_upload.'/'.$filebaru;
        $user->save();

        return redirect('profile');
    }

    public function index()
    {
        //buka index. Ambil data user terotentikasi, kemudian passing ke view home
        $anggota = Auth::user();
        //transform dari db id_jabatan (angka) ke string, misal 1 jadi Ketua Takmir
        $anggota->status = Anggota_Status::find($anggota->id_status)->status;
        $anggota->jabatan = Anggota_Jabatan::find($anggota->id_jabatan)->jabatan;
        return view('profile', ['anggota' => $anggota]);
    }
}
