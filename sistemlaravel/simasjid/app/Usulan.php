<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usulan extends Model
{
    //
    use Notifiable;

    protected $table = 'usulan';

    protected $fillable = [
        'id', 'nama', 'jenis_usulan', 'id_pengusul', 'id_pengelola', 'id_katalog', 'harga_usulan', 'status_usulan', 'jumlah', 'keterangan', 'status_usulan', 'created_at', 'updated_at'
    ];

    //usulan terdapat kategori aset
    public function katalog()
    {
        return $this->hasOne('App\Katalog', 'id', 'id_katalog');
    }

    //jika usulan disetujui, maka akan dibeli
    public function pembelian()
    {
        return $this->hasOne('App\Pembelian', 'id_usulan', 'id');
    }

    //usulan terdapat anggota pembuat usul
    public function pengusul()
    {
        return $this->hasOne('App\Anggota', 'id', 'id_pengusul');
    }

    //usulan terdapat anggota pengelola aset yg update usulannya
    public function pengelola()
    {
        return $this->hasOne('App\Anggota', 'id', 'id_pengelola');
    }
    
}
