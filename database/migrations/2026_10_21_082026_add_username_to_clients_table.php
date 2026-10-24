<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Mengecek apakah kolom 'username' BELUM ada di tabel 'clients'
        if (!Schema::hasColumn('clients', 'username')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->string('username')->nullable()->after('name');
            });
        }
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
