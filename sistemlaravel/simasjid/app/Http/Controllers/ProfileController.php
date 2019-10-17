<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Anggota_Status;
use App\Anggota_Jabatan;
use Validator;

class ProfileController extends Controller
{

    public function uploadFoto(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // validasi jenis file
        $request->validate([
            'file' => 'image|mimes:gif,jpeg,png,jpg,bmp|max:2048'
        ]);
        
        // tujuan folder upload
        $tujuan_upload = 'foto_profil';

        //format nama file sesuai dengan username anggota
        //kemudian simpan linknya
        $anggota = Auth::user();
        $filebaru = $anggota->username . '.' . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $filebaru);
        $anggota->link_foto = $tujuan_upload . '/' . $filebaru;
        $anggota->save();

        //kembalikan ke halaman profile
        return redirect('profile');
    }

    public function index()
    {
        //buka index. Ambil data user terotentikasi, kemudian passing ke view home
        $anggota = Auth::user();
        //transform dari db id_jabatan (angka) ke string, misal 1 jadi Ketua Takmir
        $anggota->status = Anggota_Status::find($anggota->id_status)->status;
        $anggota->jabatan = Anggota_Jabatan::find($anggota->id_jabatan)->jabatan;

        //tampilkan view profile dengan data anggota
        return view('profile.profile', ['anggota' => $anggota]);
    }
}
