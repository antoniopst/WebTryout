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
        Schema::table('mapel', function (Blueprint $table) {
            $table->string('slug')->unique()->after('nama_mapel'); // Tambahkan kolom slug
        });
    }


        /**
         * Reverse the migrations.
         */
        public function down()
    {
        Schema::table('mapel', function (Blueprint $table) {
            $table->dropColumn('slug'); // Hapus kolom slug jika rollback
        });
    }
};
