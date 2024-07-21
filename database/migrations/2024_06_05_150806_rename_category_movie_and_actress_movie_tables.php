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
        Schema::rename('category_movie', 'categories_movies');
        Schema::rename('actress_movie', 'actresses_movies');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('categories_movies', 'category_movie');
        Schema::rename('actresses_movies', 'actress_movie');
    }
};
