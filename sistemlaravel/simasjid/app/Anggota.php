<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    
    function hello(){
        echo "helloooo";
    }

    function getDataAnggota(){
        // echo "helloooo";
        return $this->where('username', 'ketua')->where('password', 'password')->first();
    }
}
