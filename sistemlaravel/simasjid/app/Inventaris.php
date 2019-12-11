<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    //
    protected $table = 'inventaris';

    public function pembelian(){
        return $this->hasOne('App\Pembelian', 'id', 'id_pembelian');
    }
}
