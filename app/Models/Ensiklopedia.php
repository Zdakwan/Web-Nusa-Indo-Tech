<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensiklopedia extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel secara eksplisit
    protected $table = 'ensiklopedia';

    // Menggunakan fillable untuk memastikan Laravel membaca kolom ini secara eksplisit
    protected $fillable = [
        'judul',
        'kategori',
        'gambar',
        'konten'
    ];
}
