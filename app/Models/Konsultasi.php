<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    // Nama tabel di database
    protected $table = 'konsultasi';

    // Kolom yang boleh diisi melalui proses penyimpanan
    protected $fillable = [
        'client_id',
        'nama_perusahaan',
        'nama_pic',
        'jabatan_pic',
        'email_pic',
        'telepon_pic',
        'jenis_konsultasi',
        'tanggal_konsultasi',
        'waktu_konsultasi',
        'catatan_klien',
        'status',
        'link_meeting',
    ];
}