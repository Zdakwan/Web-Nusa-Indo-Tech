<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'konsultasi';

    // Kolom yang boleh diisi melalui proses mass-assignment
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
        'pesan_admin', // Fitur Anda
        'link_meeting',
    ];

    // Relasi ke tabel clients (Milik Anda)
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
