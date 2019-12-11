<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kategori extends Model
{
    //
    use Notifiable;

    protected $table = 'kategori';

    protected $fillable = [
        'id', 'id_pj', 'nama'
    ];

    public $timestamps = false; 
    
    public function list_pj_kategori()
    {
        return $this->hasMany('App\PJ_Kategori', 'id_kategori', 'id');
    }


}
