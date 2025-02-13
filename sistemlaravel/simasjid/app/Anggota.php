<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordReset;

class Anggota extends Authenticatable
{
    use Notifiable;
    protected $table = 'anggota';

    protected $fillable = [
        'id_jabatan', 'username', 'password', 'nama', 'alamat', 'telp', 'email', 'link_foto', 'id_status'
    ];

    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }



}
