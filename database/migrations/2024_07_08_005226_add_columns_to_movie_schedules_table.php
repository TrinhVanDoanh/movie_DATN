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
        Schema::table('movie_schedules', function (Blueprint $table) {
            $table->timestamp('start_time')->nullable()->after('movie_id');
            $table->timestamp('end_time')->nullable()->after('start_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie_schedules', function (Blueprint $table) {
            if (Schema::hasColumn('movie_schedules', 'start_time')) {
                $table->dropColumn('start_time');
            }
            if (Schema::hasColumn('movie_schedules', 'end_time')) {
                $table->dropColumn('end_time');
            }
        });
    }
};
