
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom data perusahaan dan PIC
     * pada tabel konsultasi.
     */
    public function up(): void
    {
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_pic')->nullable();
            $table->string('email_pic')->nullable();
            $table->string('telepon_pic', 30)->nullable();
            $table->string('jenis_konsultasi', 100)->nullable();
        });
    }

    /**
     * Menghapus kolom tambahan jika migration di-rollback.
     */
    public function down(): void
    {
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->dropColumn([
                'nama_perusahaan',
                'nama_pic',
                'email_pic',
                'telepon_pic',
                'jenis_konsultasi',
            ]);
        });
    }
};
