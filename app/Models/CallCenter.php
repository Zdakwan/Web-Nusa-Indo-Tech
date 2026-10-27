<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallCenter extends Model
{
    protected $table = 'call_centers';

    protected $fillable = [
        'client_id',
        'nama',
        'email',
        'subjek',
        'pesan',
        'file_path',
        'file_name',
        'status',
        'pesan_admin',
        'admin_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}