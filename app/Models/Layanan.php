<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar Laravel tidak mencari tabel 'layanans'
    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'kategori',
        'deskripsi',
        'icon',
    ];

    public function portofolios()
    {
        // Ganti 'id_layanan' menjadi 'layanan_id' agar cocok dengan kolom database
        return $this->hasMany(Portofolio::class, 'layanan_id');
    }
}
