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
        'nama', 'id_jenis', 'id_pengusul', 'id_pengelola', 'id_kategori', 'harga', 'status_usulan',
    ];

    //usulan terdapat jenis aset
    public function jenis_aset()
    {
        return $this->hasOne('App\Jenis_aset', 'id', 'id_jenis');
    }

    //usulan terdapat kategori aset
    public function kategori()
    {
        return $this->hasOne('App\Kategori_aset', 'id', 'id_kategori');
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
