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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_schedule_id');
            $table->unsignedBigInteger('bill_id');
            $table->string('seat_code');
            $table->timestamps();
            $table->foreign('movie_schedule_id')->references('id')->on('movie_schedules')->onDelete('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('tickets', function (Blueprint $table){
        //     $table->dropForeign(['movie_schedule_id']);
        //     $table->dropForeign(['bill_id']);
        // });

        Schema::dropIfExists('ticket');
    }
};
