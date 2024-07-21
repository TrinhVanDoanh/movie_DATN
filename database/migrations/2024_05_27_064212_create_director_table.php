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
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('avatar',255)->nullable();
            $table->string('name', 100);
            $table->text('short_bio')->nullable();
            $table->date('birth_date')->nullable();
            $table->float('height',50)->nullable();
            $table->string('nationality',50)->nullable();
            $table->longText('biography')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director');
    }
};
