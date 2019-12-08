<?php

namespace App\Transformer;

use App\Kategori_aset;
use App\Anggota;

class Transformer
{
    public static function t_jabatan($id_jabatan)
    {
        switch ($id_jabatan) {
            case 1:
                return 'Ketua Takmir';
                break;
            case 2:
                return 'Sekretaris Takmir';
                break;
            case 3:
                return 'Bendahara Takmir';
                break;
            case 4:
                return 'Takmir Masjid';
                break;
            case 5:
                return 'Remaja Masjid';
                break;
            default:
                return 'Anggota Terdaftar';
                break;
        }
    }

    public static function t_status($id_status)
    {
        switch ($id_status) {
            case 1:
                return 'Aktif';
                break;
            case 2:
                return 'Non-Aktif';
                break;
            case 3:
                return 'Belum Verifikasi';
                break;
            default:
                return 'Anggota Terdaftar';
                break;
        }
    }

    public static function t_jenis_aset($id_jenis_aset)
    {
        switch ($id_jenis_aset) {
            case 1:
                return 'Aset Tetap';
                break;
            case 2:
                return 'Persediaan';
                break;
            case 3:
                return 'Buku';
                break;
            default:
                return 'Aset Lainnya';
                break;
        }
    }

    public static function t_kategori_aset($id_kategori)
    {
        $kategori_aset = Kategori_aset::get()->where('id_kategori', '=', $id_kategori)->first();
        return $kategori_aset->nama_kategori;
    }

    public static function t_anggota($id_anggota)
    {
        if ($id_anggota != NULL) {
            $anggota = Anggota::get()->where('id', '=', $id_anggota)->first();
            return $anggota->nama;
        } else {
            return "-";
        }
    }
}
