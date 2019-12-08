<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Pengelola_aset;
use Auth;
use App\Transformer\Transformer;
// use App\Anggota_Jabatan;
// use App\Anggota_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $anggota_dalam_list->status = Transformer::t_status($anggota_dalam_list->id_status);
            $anggota_dalam_list->jabatan = Transformer::t_jabatan($anggota_dalam_list->id_jabatan);
        }
        //retval
        return view('anggota.anggotaTerdaftar', ['list_anggota' => $list_anggota, 'anggota' => $anggota]);
    }

    //mendapatkan detail anggota berdasarkan id
    public function getDetail($id)
    {
        $detail_anggota = Anggota::get()->where('id', $id)->first();

        $detail_anggota->jabatan = Transformer::t_jabatan($detail_anggota->id_jabatan);
        $detail_anggota->status = Transformer::t_status($detail_anggota->id_status);
        // $detail_anggota->status = Anggota_Status::find($detail_anggota->id_status)->status;
        // $detail_anggota->jabatan = Anggota_Jabatan::find($detail_anggota->id_jabatan)->jabatan;
        return $detail_anggota;
    }

    //mendapatkan semua pendaftar yg belum diverifikasi
    public function getUnverifiedList()
    {
        //user terotentikasi
        $anggota = Auth::user();

        //controlRole hanya 1,3 ketua dan sekretaris
        // $authorized = array(1, 3);
        // if (!in_array($anggota->id_jabatan, $authorized)) {
        //     return redirect(route('home'));
        // }

        //semua user blm verifikasi, composite object
        $list_anggota = Anggota::get()->where('id_status', '=', 3);

        // id ke nilai
        foreach ($list_anggota as $anggota_dalam_list) {
            $anggota_dalam_list->status = Transformer::t_status($anggota_dalam_list->id_status);
            $anggota_dalam_list->jabatan = Transformer::t_jabatan($anggota_dalam_list->id_jabatan);
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
    public function terima(Request $request)
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

    //mendapatkan anggota pengelola aset
    public function pengelola_aset_index()
    {
        //get all id pengelola
        $list_pengelola = DB::table('Pengelola_aset')
            ->join('anggota', 'Pengelola_aset.id_anggota', '=', 'anggota.id')
            ->select('Pengelola_aset.id_anggota as id', 'anggota.id_status', 'anggota.id_jabatan', 'anggota.nama')
            ->get();

        //default, semuanya bukan pengelola
        // $list_bukan_pengelola = Anggota::get()->where('id_status', '=', 1);

        //jika ada pengelola, inilah list bukan pengelolanya (untuk pilihan pengelola)
        $list_bukan_pengelola = DB::table('anggota')->select('*')
                                                    ->where('anggota.id_status', '=', 1)
                                                    ->whereNotIn('id',function($query) {
                                                            $query->select('id_anggota')->from('Pengelola_aset');
                                                    })
                                                    ->get();
        //user terotentikasi
        $anggota = Auth::user();
        //id ke nilai
        foreach ($list_pengelola as $pengelola_dalam_list) {
            $pengelola_dalam_list->status = Transformer::t_status($pengelola_dalam_list->id_status);
            $pengelola_dalam_list->jabatan = Transformer::t_jabatan($pengelola_dalam_list->id_jabatan);
        }

        foreach ($list_bukan_pengelola as $bukan_pengelola_dalam_list) {
            $bukan_pengelola_dalam_list->status = Transformer::t_status($bukan_pengelola_dalam_list->id_status);
            $bukan_pengelola_dalam_list->jabatan = Transformer::t_jabatan($bukan_pengelola_dalam_list->id_jabatan);
        }
        //retval
        return view('anggota.anggotaPengelolaAset', ['list_pengelola' => $list_pengelola, 'list_bukan_pengelola' => $list_bukan_pengelola, 'anggota' => $anggota]);
    }

    //menambah pengelola aset
    public function pengelola_aset_add(Request $request)
    {
        DB::table('Pengelola_aset')->insert(['id_anggota' => $request->id_anggota]);
        return redirect(route('anggotaPengelolaAset'));
    }

    //menghapus hak pengelola aset
    public function pengelola_aset_delete(Request $request)
    {
        DB::table('Pengelola_aset')->where('id_anggota', '=', $request->anggotaId)->delete();
        return redirect(route('anggotaPengelolaAset'));
    }
}
