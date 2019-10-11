<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota_Status extends Model
{
    protected $table = 'anggota_status';
    protected $primaryKey = 'id_status';
    public $timestamps = false;
}
