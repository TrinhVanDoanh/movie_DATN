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
        Schema::create('actress_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actress_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            $table->foreign('actress_id')->references('id')->on('actresses')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('actress_movie', function (Blueprint $table){
        //     $table->dropForeign(['actress_id','movie_id']);
        // });
        Schema::dropIfExists('actress_movie');
    }
};
