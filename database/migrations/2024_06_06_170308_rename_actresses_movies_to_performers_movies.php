<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('actresses_movies', 'performers_movies');

        // Đổi tên cột trong bảng mới
        Schema::table('performers_movies', function (Blueprint $table) {
            $table->renameColumn('actress_id', 'performer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performers_movies', function (Blueprint $table) {
            $table->renameColumn('performer_id', 'actress_id');
        });

        // Đổi lại tên bảng
        Schema::rename('performers_movies', 'actresses_movies');
    }
};
