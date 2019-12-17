<?php

namespace App\Models\Aset\Usulan;

use Illuminate\Database\Eloquent\Model;

class Group_Usulan extends Model
{
    //
    protected $table = 'group_usulan';

    protected $fillable = [
        'id', 'nama_usulan', 'id_pembuat', 'id_pengelola', 'status', 'created_at', 'updated_at'
    ];

    public function usulan(){
        return $this->hasMany('App\Models\Aset\Usulan\Usulan', 'id_group_usulan', 'id');
    }

     //usulan terdapat anggota pembuat usul
     public function pembuat()
     {
         return $this->hasOne('App\Models\Anggota\Anggota', 'id', 'id_pembuat');
     }
 
     //usulan terdapat anggota pengelola aset yg update usulannya
     public function pengelola()
     {
         return $this->hasOne('App\Models\Anggota\Anggota', 'id', 'id_pengelola');
     }
     
}
