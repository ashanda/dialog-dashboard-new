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
        Schema::table('fishers', function (Blueprint $table) {
            $table->string('image_day1')->nullable()->after('image');
            $table->string('image_day2')->nullable()->after('image_day1');
            $table->string('image_day3')->nullable()->after('image_day2');
            $table->string('image_day4')->nullable()->after('image_day3');
            $table->string('image_day5')->nullable()->after('image_day4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fishers', function (Blueprint $table) {
            $table->dropColumn(['image_day1', 'image_day2', 'image_day3', 'image_day4', 'image_day5']);
        });
    }
};
