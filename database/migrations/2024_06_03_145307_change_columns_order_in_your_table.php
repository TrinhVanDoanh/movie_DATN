<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsOrderInYourTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Xóa cột image
            $table->dropColumn('image');
            // Xóa cột image_banner
            $table->dropColumn('image_banner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Thêm lại cột image
            $table->string('image')->after('producer');
            // Thêm lại cột image_banner
            $table->string('image_banner')->after('image');
        });
    }
}

