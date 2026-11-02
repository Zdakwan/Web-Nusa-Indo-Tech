<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('proyek', function (Blueprint $table) {
            $table->foreignId('konsultasi_id')
                ->nullable()
                ->unique()
                ->after('id')
                ->constrained('konsultasi')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('proyek', function (Blueprint $table) {
            $table->dropForeign(['konsultasi_id']);
            $table->dropUnique(['konsultasi_id']);
            $table->dropColumn('konsultasi_id');
        });
    }
};