<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferensi_notifikasi', function (Blueprint $table) {
            $table->id();

            // Setiap client memiliki satu pengaturan notifikasi.
            $table->foreignId('client_id')
                ->unique()
                ->constrained('clients')
                ->cascadeOnDelete();

            // Status awal semua notifikasi aktif.
            $table->boolean('update_konsultasi')->default(true);
            $table->boolean('perubahan_jadwal')->default(true);
            $table->boolean('updated_proyek')->default(true);
            $table->boolean('artikel_ensiklopedia')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferensi_notifikasi');
    }
};