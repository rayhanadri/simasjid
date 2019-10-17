<?php

namespace App\Http\Controllers;

use App\Anggota;
use Auth;
use App\Anggota_Jabatan;
use App\Anggota_Status;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    //mendapatkan anggota terdaftar aktif dan non-aktif
    public function index()
    {
        //semua user, composite object
        $list_anggota = Anggota::get()->where('id_status', '!=', 3);
        //user terotentikasi
        $anggota = Auth::user();
        //id ke nilai
        foreach ($list_anggota as $anggota_dalam_list) {
            $anggota_dalam_list->status = Anggota_Status::find($anggota_dalam_list->id_status)->status;
            $anggota_dalam_list->jabatan = Anggota_Jabatan::find($anggota_dalam_list->id_jabatan)->jabatan;
        }
        //retval
        return view('anggota.anggotaTerdaftar', ['list_anggota' => $list_anggota, 'anggota' => $anggota]);
    }

    //mendapatkan detail anggota berdasarkan id
    public function getDetail($id)
    {
        $detail_anggota = Anggota::get()->where('id', $id)->first();
        $detail_anggota->status = Anggota_Status::find($detail_anggota->id_status)->status;
        $detail_anggota->jabatan = Anggota_Jabatan::find($detail_anggota->id_jabatan)->jabatan;
        return $detail_anggota;
    }

    //mendapatkan semua pendaftar yg belum diverifikasi
    public function getUnverifiedList()
    {
        //user terotentikasi
        $anggota = Auth::user();
        
        //controlRole hanya 1,3 ketua dan sekretaris
        $authorized = array(1, 3);
        if (!in_array($anggota->id_jabatan, $authorized)) {
            return redirect(route('home'));
        }

        //semua user blm verifikasi, composite object
        $list_anggota = Anggota::get()->where('id_status', '=', 3);

        //id ke nilai
        foreach ($list_anggota as $anggota_dalam_list) {
            $anggota_dalam_list->status = Anggota_Status::find($anggota_dalam_list->id_status)->status;
            $anggota_dalam_list->jabatan = Anggota_Jabatan::find($anggota_dalam_list->id_jabatan)->jabatan;
        }
        //retval
        return view('anggota.anggotaBlmVerifikasi', ['list_anggota' => $list_anggota, 'anggota' => $anggota]);
    }

    //menolak verifikasi pendaftaran
    public function tolak(Request $request)
    {
        $deleted_anggota = Anggota::get()->where('id', $request->anggotaId)->first();
        $deleted_anggota->delete();

        return redirect(route('anggotaBlmVerifikasi'));
    }

    //terima verifikasi pendaftaran
    public function verif(Request $request)
    {
        $detail_anggota = Anggota::get()->where('id', $request->anggotaId)->first();
        $detail_anggota->id_status = 1;
        $detail_anggota->save();
        return redirect(route('anggotaBlmVerifikasi'));
    }

    //menghapus akun anggota
    public function delete(Request $request)
    {
        $deleted_anggota = Anggota::get()->where('id', $request->anggotaId)->first();
        $deleted_anggota->delete();

        return redirect(route('anggotaTerdaftar'));
    }

    //mengedit data akun anggota
    public function edit(Request $request)
    {
        //edited user
        $edited_anggota = Anggota::get()->where('id', $request->anggotaId)->first();

        if (!$request->username == $edited_anggota->username) {
            $edited_anggota->username = $request->username;
            $edited_anggota->save();
        }
        if (!$request->email == $edited_anggota->email) {
            $edited_anggota->email = $request->email;
            $edited_anggota->save();
        }
        $edited_anggota->nama = $request->nama;
        $edited_anggota->id_jabatan = $request->id_jabatan;
        $edited_anggota->id_status = $request->id_status;
        $edited_anggota->alamat = $request->alamat;
        $edited_anggota->telp = $request->telp;
        $edited_anggota->save();

        return redirect(route('anggotaTerdaftar'));
    }
}
