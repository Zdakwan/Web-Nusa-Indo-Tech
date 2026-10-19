<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    // Nama tabel di database
    protected $table = 'konsultasi';

    // Kolom yang boleh diisi
    protected $fillable = [
        'client_id',
        'tanggal_konsultasi',
        'waktu_konsultasi',
        'catatan_klien',
        'status',
        'link_meeting',
    ];
}
