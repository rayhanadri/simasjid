<?php

namespace App\Http\Controllers;

use App\Transformer\Transformer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{

    public function uploadFoto(Request $request)
    {
        // $this->validate($request, [
        //     'file' => 'required'
        // ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // validasi jenis file
        $allowed_extension = ['jpg', 'jpeg', 'gif', 'png', 'bmp'];
        $extension = $file->getClientOriginalExtension();
        $inside_allowed = in_array($extension, $allowed_extension);
        if( !$inside_allowed ){
            throw ValidationException::withMessages([
                'file' => 'Format file gambar yang diperbolehkan adalah jpg, jpeg, gif, png, dan bmp.',
            ]);
        }

        // tujuan folder upload
        $tujuan_upload = 'foto_profil';

        //format nama file sesuai dengan username anggota (Anggota adalah authenticated user).
        //kemudian simpan linknya
        $anggota = Auth::user();
        $filebaru = $anggota->username . '.' . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $filebaru);
        $anggota->link_foto = $tujuan_upload . '/' . $filebaru;
        $anggota->save();

        //kembalikan ke halaman profile
        return view('profile.profile', ['anggota' => $anggota]);
    }

    public function index()
    {
        //buka index. Ambil data user terotentikasi, kemudian passing ke view home
        $anggota = Auth::user();
        //transform dari db id_jabatan (angka) ke string, misal 1 jadi Ketua Takmir
        $anggota->jabatan = Transformer::t_jabatan($anggota->id_jabatan);
        $anggota->status = Transformer::t_status($anggota->id_status);
        // $anggota->status = Anggota_Status::find($anggota->id_status)->status;
        // $anggota->jabatan = Anggota_Jabatan::find($anggota->id_jabatan)->jabatan;

        //tampilkan view profile dengan data anggota
        return view('profile.profile', ['anggota' => $anggota]);
    }
}
