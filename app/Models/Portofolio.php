<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';

    // Semua kolom diizinkan untuk diisi massal kecuali 'id'
    protected $guarded = ['id'];

    // Relasi balik ke model Layanan (Setiap portofolio milik 1 layanan)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
