<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyek extends Model
{
    protected $table = 'proyek';

    protected $fillable = [
        'konsultasi_id',
        'client_id',
        'admin_id',
        'nama_proyek',
        'deskripsi',
        'progres',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'progres' => 'integer',
        ];
    }

    // Relasi ke client pemilik proyek
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // Relasi ke admin pembuat atau pengelola proyek
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // Relasi ke konsultasi yang menjadi dasar pembuatan proyek
    public function konsultasi(): BelongsTo
    {
        return $this->belongsTo(Konsultasi::class, 'konsultasi_id');
    }

    // Relasi ke seluruh riwayat progres proyek
    public function riwayat(): HasMany
    {
        return $this->hasMany(RiwayatProyek::class, 'proyek_id')
            ->latest();
    }
}