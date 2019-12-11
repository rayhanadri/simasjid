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
        'id', 'id_usulan', 'nama', 'harga_pembelian','penjual', 'telp_penjual', 'status_pembelian', 'link_foto_nota', 'created_at', 'updated_at' 
    ];

    //pembelian terdapat jenis aset
    public function usulan()
    {
        return $this->hasOne('App\Usulan', 'id', 'id_usulan');
    }

    public function inventaris()
    {
        return $this->hasOne('App\Inventaris', 'id_pembelian', 'id');
    }

    public function petugas(){
        return $this->hasOne('App\Anggota', 'id', 'id_petugas');
    }

    public function pengelola(){
        return $this->hasOne('App\Anggota', 'id', 'id_pengelola');
    }
}
