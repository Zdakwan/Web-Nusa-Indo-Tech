<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'phone', 'role', 'password'];

    protected $hidden = ['password'];

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function roleLabel(): string
    {
        return match ($this->role) {
            'super_admin'   => 'Super Admin',
            'admin_konten'  => 'Admin Konten',
            'admin_layanan' => 'Admin Layanan',
            default         => 'Admin',
        };
    }
}
