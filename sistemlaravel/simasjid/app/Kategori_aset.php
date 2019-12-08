<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kategori_aset extends Model
{
    //
    use Notifiable;

    protected $table = 'kategori_aset';

    protected $fillable = [
        'nama_kategori', 'jenis_aset'
    ];
}
