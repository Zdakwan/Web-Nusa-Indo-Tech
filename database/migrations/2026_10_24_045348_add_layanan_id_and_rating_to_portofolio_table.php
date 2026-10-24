<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('portofolio', function (Blueprint $table) {
            // Menambahkan kolom layanan_id dan rating
            $table->unsignedBigInteger('layanan_id')->nullable()->after('id');
            $table->float('rating', 2, 1)->default(0)->after('layanan_id'); // format 2 digit, 1 desimal (contoh: 4.5)
        });
    }

    public function down()
    {
        Schema::table('portofolio', function (Blueprint $table) {
            $table->dropColumn(['layanan_id', 'rating']);
        });
    }
};
