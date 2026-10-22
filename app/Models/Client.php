<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
   use Notifiable;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'username',
        'email',
        'no_telp',
        'phone',
        'password',
        'avatar',
        'foto_profil',
        'address',
        'alamat',
        'company',
        'nama_perusahaan',
        'position',
        'jabatan',
    ];

    protected $hidden = [
        'password',
    ];
}