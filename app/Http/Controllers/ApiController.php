<?php

namespace App\Http\Controllers;

use App\Models\Habour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class ApiController extends Controller
{
     public function getHarbourLocations()
    {
        $harbourLocations = Habour::all(); // Fetch data from the database
         foreach ($harbourLocations as $harbourLocation) {
            // Handle boolean values for image URLs
            $harbourLocation->second_image_url = $harbourLocation->second_image_url ?? false;
            $harbourLocation->third_image_url = $harbourLocation->third_image_url ?? false;
            $harbourLocation->fourth_image_url = $harbourLocation->fourth_image_url ?? false;

            // Handle empty string for play durations
            $harbourLocation->second_image_play_duration = $harbourLocation->second_image_play_duration ?? "";
            $harbourLocation->third_image_play_duration = $harbourLocation->third_image_play_duration ?? "";
            $harbourLocation->fourth_image_play_duration = $harbourLocation->fourth_image_play_duration ?? "";

            $harbourLocation->fourth_site_duration = $harbourLocation->fourth_site_duration ?? "";
            $harbourLocation->fifth_site_duration = $harbourLocation->fifth_site_duration ?? "";
            $harbourLocation->sixth_site_duration = $harbourLocation->sixth_site_duration ?? "";
            $harbourLocation->seventh_site_duration = $harbourLocation->seventh_site_duration ?? "";

            $harbourLocation->fourth_website_url = $harbourLocation->fourth_website_url ?? "";
            $harbourLocation->fifth_website_url = $harbourLocation->fifth_website_url ?? "";
            $harbourLocation->sixth_website_url = $harbourLocation->sixth_website_url ?? "";
            $harbourLocation->seventh_website_url = $harbourLocation->seventh_website_url ?? "";

            $harbourLocation->first_video_url = $harbourLocation->first_video_url ?? false;
            $harbourLocation->first_video_play_duration = $harbourLocation->first_video_play_duration ?? "";

            $harbourLocation->second_video_url = $harbourLocation->second_video_url ?? false;
            $harbourLocation->second_video_play_duration = $harbourLocation->second_video_play_duration ?? "";
        }
        $harbourLocations->makeHidden(['created_at', 'updated_at']);
        return response()->json($harbourLocations);
    }
}

