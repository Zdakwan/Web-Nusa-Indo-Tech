<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('portofolio', function (Blueprint $table) {
            // Menambahkan kolom fitur_utama dan teknologi
            $table->text('fitur_utama')->nullable()->after('deskripsi');
            $table->string('teknologi')->nullable()->after('fitur_utama');
        });
    }

    public function down()
    {
        Schema::table('portofolio', function (Blueprint $table) {
            $table->dropColumn(['fitur_utama', 'teknologi']);
        });
    }
};
