<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Anggota;

class VerifikasiController extends AnggotaController
{
    public function index()
    {
        //check akses sekretaris
        if ($this->checkAksesSekretaris() == false) {
            return redirect(route('home'));
        }

        //semua user blm verifikasi, composite object
        $anggotaGroup = Anggota::get()->where('id_status', '=', self::UNVERIFIED_MEMBER);

        // id ke string
        foreach ($anggotaGroup as $anggota) {
            $anggota->status = $this->getStatus($anggota);
            $anggota->jabatan = $this->getJabatan($anggota);
        }
        // retval
        return view('anggota.anggotaBlmVerifikasi', ['anggotaGroup' => $anggotaGroup]);
    }

    //menolak verifikasi pendaftaran, return list anggota blm verifikasi
    public function tolak(Request $request)
    {
        //check akses sekretaris
        if ($this->checkAksesSekretaris() == false) {
            return redirect(route('home'));
        }
        $deleted_anggota = Anggota::get()->where('id', $request->id)->first();
        $deleted_anggota->delete();
        return redirect(route('anggotaBlmVerifikasi'));
    }

    //terima verifikasi pendaftaran, return list anggota blm verifikasi
    public function terima(Request $request)
    {
        //check akses sekretaris
        if ($this->checkAksesSekretaris() == false) {
            return redirect(route('home'));
        }
        $detail_anggota = Anggota::get()->where('id', $request->id)->first();
        $detail_anggota->id_status = 1;
        $detail_anggota->save();
        return redirect(route('anggotaBlmVerifikasi'));
    }
}
