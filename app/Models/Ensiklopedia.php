<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensiklopedia extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel secara eksplisit
    protected $table = 'ensiklopedia';

    // Mengizinkan mass-assignment untuk proses Create/Update
    protected $guarded = ['id'];
}
