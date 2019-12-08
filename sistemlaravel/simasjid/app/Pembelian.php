<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pembelian extends Model
{
    //
    use Notifiable;

    protected $table = 'pembelian';

    protected $fillable = [
        'nama', 'id_jenis', 'id_petugas', 'id_pengelola', 'id_kategori', 'jumlah', 'harga','penjual', 'telp_penjual', 'status_pembelian', 'created_at', 'updated_at', 'link_foto_nota'
    ];

    //pembelian terdapat jenis aset
    public function jenis_aset()
    {
        return $this->hasOne('App\Jenis_aset', 'id', 'id_jenis');
    }

    //pembelian terdapat kategori aset
    public function kategori()
    {
        return $this->hasOne('App\Kategori_aset', 'id', 'id_kategori');
    }

    //pembelian terdapat anggota petugas pembelian
    public function petugas()
    {
        return $this->hasOne('App\Anggota', 'id', 'id_petugas');
    }

    //pembelian terdapat anggota pengelola aset yg buat dan update usulannya
    public function pengelola()
    {
        return $this->hasOne('App\Anggota', 'id', 'id_pengelola');
    }
}
