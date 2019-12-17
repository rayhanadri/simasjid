<?php

namespace App\Models\Aset\Usulan;

use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    //
    protected $table = 'usulan';
    public $timestamps = false; 

    protected $fillable = [
        'id', 'id_group_usulan', 'nama_barang', 'jumlah'
    ];

   
}
