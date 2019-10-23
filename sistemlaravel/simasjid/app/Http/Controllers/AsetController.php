<?php

namespace App\Http\Controllers;

use App\Anggota;
use Auth;
use App\Anggota_Jabatan;
use App\Anggota_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AsetController extends Controller
{
    //mendapatkan anggota terdaftar aktif dan non-aktif
    public function index()
    {
        $id = Input::get('id');
        if ($id != 0 && $id <= 9) {
            echo "true " . $id;
            $anggota = Auth::user();
            // Create image
            
        } else {
            // echo "false";

            // semua user, composite object
            $list_anggota = Anggota::get()->where('id_status', '!=', 3);
            //user terotentikasi
            $anggota = Auth::user();
            //id ke nilai
            foreach ($list_anggota as $anggota_dalam_list) {
                $anggota_dalam_list->status = Anggota_Status::find($anggota_dalam_list->id_status)->status;
                $anggota_dalam_list->jabatan = Anggota_Jabatan::find($anggota_dalam_list->id_jabatan)->jabatan;
            }
            //retval
            return view('aset.masterAset', ['list_anggota' => $list_anggota, 'anggota' => $anggota]);
        }
    }

    //mendapatkan detail anggota berdasarkan id
    public function getDetail($id)
    {
        $detail_anggota = Anggota::get()->where('id', $id)->first();
        $detail_anggota->status = Anggota_Status::find($detail_anggota->id_status)->status;
        $detail_anggota->jabatan = Anggota_Jabatan::find($detail_anggota->id_jabatan)->jabatan;
        return $detail_anggota;
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

        if ($request->username != $edited_anggota->username) {
            $edited_anggota->username = $request->username;
            $request->validate([
                'username' => 'unique:anggota'
            ]);
            $edited_anggota->save();
        }
        if ($request->email != $edited_anggota->email) {
            $edited_anggota->email = $request->email;
            $request->validate([
                'email' => 'unique:anggota|email'
            ]);
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
