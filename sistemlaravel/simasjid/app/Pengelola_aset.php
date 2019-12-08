<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelola_aset extends Model
{
    //
    protected $table = 'pengelola_aset';

    protected $fillable = [
        'id_pengelola',
    ];

    //pengelola anggota adalah anggota
    public function anggota_pengelola()
    {
        return $this->hasOne('App\Anggota', 'id', 'id_pengelola');
    }
}
