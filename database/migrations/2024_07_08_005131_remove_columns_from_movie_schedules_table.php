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
            // Xóa cột 'date' nếu tồn tại
            if (Schema::hasColumn('movie_schedules', 'date')) {
                $table->dropColumn('date');
            }

            // Xóa cột 'start_time' và 'end_time' nếu tồn tại
            if (Schema::hasColumn('movie_schedules', 'start_time')) {
                $table->dropColumn('start_time');
            }
            if (Schema::hasColumn('movie_schedules', 'end_time')) {
                $table->dropColumn('end_time');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie_schedules', function (Blueprint $table) {
            // Thêm lại cột 'date'
            $table->date('date')->after('id');

            // Thêm lại cột 'start_time' và 'end_time' với kiểu dữ liệu 'time'
            $table->time('start_time')->after('movie_id');
            $table->time('end_time')->after('start_time');
        });
    }
};
