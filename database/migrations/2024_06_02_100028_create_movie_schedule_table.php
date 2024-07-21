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
        Schema::create('movie_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('movie_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('price_ticket');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('movie_schedules', function (Blueprint $table){
        //     $table->dropForeign(['room_id']);
        //     $table->dropForeign(['movie_id']);
        // });
        Schema::dropIfExists('movie_schedule');
    }
};
