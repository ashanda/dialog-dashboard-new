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
            // Rename the old 'name' column if needed
            $table->renameColumn('name', 'english_name');

            // Add new columns
            $table->string('sinhala_name')->after('id');
            $table->string('tamil_name')->after('english_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fishers', function (Blueprint $table) {
            $table->renameColumn('english_name', 'name');
            $table->dropColumn(['sinhala_name', 'tamil_name']);
        });
    }
};
