<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE login_logs
            MODIFY COLUMN status VARCHAR(50) NOT NULL
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tetap menggunakan VARCHAR(50) agar
        // riwayat Logout tidak hilang saat rollback.
        DB::statement("
            ALTER TABLE login_logs
            MODIFY COLUMN status VARCHAR(50) NOT NULL
        ");
    }
};