<?php

namespace App\Http\Controllers;

use App\Models\LocationUser;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locationUser = LocationUser::where('locations', $request->location_id)->first();
        $userIdJson = json_encode($request->user_id);
        if ($locationUser === null) {
            // If the record doesn't exist, create a new one
            $locationUser = new LocationUser();
            $locationUser->locations = $request->location_id;
            $locationUser->user_id = $userIdJson; // Assuming user_id is an array
            $locationUser->save();
            Alert::success('Success', 'Assign User successfully!'); 
            
        } else {

            $locationUser = LocationUser::find($locationUser->id);
            $locationUser->user_id = $userIdJson; // Assuming user_id is an array
            $locationUser->save();
            Alert::success('Success', 'Assign User Upadate successfully!'); 
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(LocationUser $locationUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LocationUser $locationUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LocationUser $locationUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationUser $locationUser)
    {
        //
    }
}
