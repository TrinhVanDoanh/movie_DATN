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
        Schema::table('movies', function (Blueprint $table) {
            // Thêm cột image sau cột producer
            $table->string('image')->after('producer')->nullable();
            // Thêm cột image_banner sau cột image
            $table->string('image_banner')->after('image')->nullable();
        });
    }


    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Xóa cột image
            $table->dropColumn('image');
            // Xóa cột image_banner
            $table->dropColumn('image_banner');
        });
    }
};
