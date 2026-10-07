<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';

    protected $fillable = [
        'client_id', 'tanggal_konsultasi', 'waktu_konsultasi',
        'catatan_klien', 'status', 'link_meeting',
    ];

    protected $casts = [
        'tanggal_konsultasi' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
