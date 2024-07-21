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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('director_id');
            $table->date('release_date');
            $table->time('time');
            $table->string('location');
            $table->string('producer');
            $table->longText('describe');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('movies', function (Blueprint $table){
        //     $table->dropForeign(['director_id']);
        // });
        Schema::dropIfExists('movies');

    }
};
