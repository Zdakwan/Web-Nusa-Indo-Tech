<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasi';
    protected $guarded = ['id'];

    // Relasi ke tabel clients
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
