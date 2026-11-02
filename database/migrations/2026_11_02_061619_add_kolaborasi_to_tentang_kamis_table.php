<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('tentang_kamis', function (Blueprint $table) {
        $table->text('teks_kolaborasi_tim')->nullable();
        $table->text('teks_kolaborasi_serah_terima')->nullable();
        $table->string('foto_kolaborasi_tim')->nullable();
        $table->string('foto_kolaborasi_serah_terima')->nullable();
    });
}

public function down()
{
    Schema::table('tentang_kamis', function (Blueprint $table) {
        $table->dropColumn([
            'teks_kolaborasi_tim',
            'teks_kolaborasi_serah_terima',
            'foto_kolaborasi_tim',
            'foto_kolaborasi_serah_terima'
        ]);
    });
    }
};
