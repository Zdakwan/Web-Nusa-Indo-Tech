<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    // Nama tabel di database
    protected $table = 'notifikasi';

    // Kolom yang boleh diisi
    protected $fillable = [
        'client_id',
        'judul',
        'pesan',
        'is_read',
    ];

    // Mengubah is_read menjadi boolean
    protected $casts = [
        'is_read' => 'boolean',
    ];
}
