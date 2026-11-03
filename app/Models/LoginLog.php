<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel secara eksplisit agar Laravel tidak salah membaca
    protected $table = 'login_logs';

    // Mengizinkan semua kolom untuk diisi secara otomatis, kecuali ID
    protected $guarded = ['id'];
}
