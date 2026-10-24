<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('layanan', function (Blueprint $table) {
            // Menambahkan kolom kategori dengan nilai default 'Umum'
            $table->string('kategori', 100)->default('Umum')->after('nama_layanan');
        });
    }

    public function down()
    {
        Schema::table('layanan', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
