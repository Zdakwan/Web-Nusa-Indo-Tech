<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login_logs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('role')->nullable(); // Nullable jika email tidak ditemukan di database
            $table->ipAddress('ip_address'); // Tipe data khusus untuk IP (IPv4/IPv6)
            $table->string('status', 50);
            $table->timestamps(); // created_at otomatis mencatat 'waktu'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
