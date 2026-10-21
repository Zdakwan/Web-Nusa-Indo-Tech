<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreferensiNotifikasi extends Model
{
    protected $table = 'preferensi_notifikasi';

    protected $fillable = [
        'client_id',
        'update_konsultasi',
        'perubahan_jadwal',
        'updated_proyek',
        'artikel_ensiklopedia',
    ];

    protected function casts(): array
    {
        return [
            'update_konsultasi' => 'boolean',
            'perubahan_jadwal' => 'boolean',
            'updated_proyek' => 'boolean',
            'artikel_ensiklopedia' => 'boolean',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}