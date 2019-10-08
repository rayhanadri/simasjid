<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'anggota';

    protected $fillable = [
        'id_jabatan', 'username', 'password', 'nama', 'alamat', 'telp', 'email', 'link_foto',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    // function hello(){
    //     echo "helloooo";
    // }

    // function getDataAnggota(){
    //     // echo "helloooo";
    //     return $this->where('username', 'ketua')->where('password', 'password')->first();
    // }
}
