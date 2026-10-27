<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('call_centers', function (Blueprint $table) {
            $table->id();

            // Identitas pengirim laporan
            $table->foreignId('client_id')
                ->nullable()
                ->constrained('clients')
                ->nullOnDelete();

            $table->string('nama');
            $table->string('email');
            $table->string('subjek');
            $table->text('pesan');

            // Lampiran opsional
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();

            // Status dan tanggapan admin
            $table->string('status')->default('menunggu');
            $table->text('pesan_admin')->nullable();
            $table->foreignId('admin_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('call_centers');
    }
};
