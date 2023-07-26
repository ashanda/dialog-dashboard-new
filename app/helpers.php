<?php

use App\Models\LocationUser;
use App\Models\Habour;
use App\Models\User;
use Illuminate\Support\Facades\DB;


function locationUser($locationId) {
    $users = []; // Initialize an empty array to hold the users

    $location_users = LocationUser::where('locations', $locationId)->first();

    if ($location_users) {
        $userIdsArray = json_decode($location_users->user_id, true); // Pass true as the second argument to get an associative array
        if (is_array($userIdsArray)) {
            foreach ($userIdsArray as $userId) {
                // Process each user ID here
                $user = User::where('id', $userId)->first();
                if ($user) {
                    $users[] = $user; // Add the user to the $users array
                }
            }
        } else {
            // Handle the case where the user_id is not a valid JSON array
        }
    } else {
        // Handle the case where the location_id doesn't exist in the table
    }

    return $users;
}


function all_location(){
    $location_count = Habour::count();
    return $location_count;
}

function all_user(){
    $location_count = User::count();
    return $location_count;
}