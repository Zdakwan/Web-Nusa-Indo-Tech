<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatProyek extends Model
{
    protected $table = 'riwayat_proyek';

    protected $fillable = [
        'proyek_id',
        'admin_id',
        'progres',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'progres' => 'integer',
        ];
    }

    // Relasi ke proyek
    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    // Relasi ke admin yang memperbarui progres
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}