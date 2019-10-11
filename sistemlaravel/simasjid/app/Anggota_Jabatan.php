<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Anggota_Jabatan extends Model
{
    protected $table = 'anggota_jabatan';
    protected $primaryKey = 'id_jabatan';
    public $timestamps = false;
}
