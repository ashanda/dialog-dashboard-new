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
        Schema::create('habours', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->json('location_data')->nullable();
            $table->string('first_website_url');
            $table->string('first_site_duration');
            $table->string('second_website_url');
            $table->string('second_site_duration');
            $table->string('third_website_url');
            $table->string('third_site_duration');
            $table->string('fourth_website_url')->nullable();
            $table->string('fourth_site_duration')->nullable();
            $table->string('fifth_website_url')->nullable();
            $table->string('fifth_site_duration')->nullable();
            $table->string('sixth_website_url')->nullable();
            $table->string('sixth_site_duration')->nullable();
            $table->string('seventh_website_url')->nullable();
            $table->string('seventh_site_duration')->nullable();
            $table->string('first_image_url');
            $table->string('first_image_play_duration');
            $table->string('second_image_url')->nullable();
            $table->string('second_image_play_duration')->nullable();
            $table->string('third_image_url')->nullable();
            $table->string('third_image_play_duration')->nullable();
            $table->string('fourth_image_url')->nullable();
            $table->string('fourth_image_play_duration')->nullable();
            $table->string('text_decription');
            $table->string('text_font_size');
            $table->string('text_font_colour');
            $table->string('text_background_colour');
            $table->string('text_decription_duration')->nullable();
            $table->string('first_video_url');
            $table->string('first_video_play_duration');
            $table->string('second_video_url')->nullable();
            $table->string('second_video_play_duration')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habours');
    }
};
