<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PJ_Kategori extends Model
{
    //
    use Notifiable;

    protected $table = 'pj_kategori';
    public $incrementing = false;

    protected $primaryKey = ['id_kategori', 'id_anggota'];

    public $timestamps = false; 
    
    //usulan kategori terdapat jenis aset
    public function kategori()
    {
        return $this->hasOne('App\Kategori', 'id', 'id_kategori');
    }

    public function anggota_pj_kategori()
    {
        return $this->hasOne('App\Anggota', 'id', 'id_anggota');
    }
}
