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
    Schema::create('tentang_kamis', function (Blueprint $table) {
        $table->id();
        $table->string('judul')->default('Transformasi Digital Bersama Kami');
        $table->text('deskripsi')->nullable();
        $table->text('visi')->nullable();
        $table->text('misi')->nullable();
        $table->text('alamat')->nullable();
        $table->string('telepon')->nullable();
        $table->string('email')->nullable();
        $table->text('gmaps_embed')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kamis');
    }
};
