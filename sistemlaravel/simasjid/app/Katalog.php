<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Katalog extends Model
{
    //
    use Notifiable;

    protected $table = 'katalog';

    protected $fillable = [
        'id', 'id_kategori', 'nama'
    ];

    public $timestamps = false; 

    //usulan kategori terdapat jenis aset
    public function kategori()
    {
        return $this->hasOne('App\Kategori', 'id', 'id_kategori');
    }
}
