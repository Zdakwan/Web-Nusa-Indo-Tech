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
        Schema::table('konsultasi', function (Blueprint $table) {
            // Mengecek ketersediaan kolom sebelum ditambahkan untuk mencegah Duplicate Column
            if (!Schema::hasColumn('konsultasi', 'konsultan')) {
                $table->string('konsultan')->nullable();
            }
            if (!Schema::hasColumn('konsultasi', 'metode')) {
                $table->string('metode')->nullable();
            }
            if (!Schema::hasColumn('konsultasi', 'link_meeting')) {
                $table->string('link_meeting')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsultasi', function (Blueprint $table) {
            $columnsToDrop = [];

            if (Schema::hasColumn('konsultasi', 'konsultan')) $columnsToDrop[] = 'konsultan';
            if (Schema::hasColumn('konsultasi', 'metode')) $columnsToDrop[] = 'metode';
            if (Schema::hasColumn('konsultasi', 'link_meeting')) $columnsToDrop[] = 'link_meeting';

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
