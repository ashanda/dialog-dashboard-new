<?php

namespace App\Http\Controllers;

use App\Models\Habour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HabourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        if(Auth::user()->type == 'admin'){
            $locations = Habour::paginate(10);
        }else{
            
        }
        return view('pages.habour',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.habour_create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        
    $validatedData = $request->validate([
        // Your validation rules for other fields
        'first_image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
        // Handle image and video uploads (you may need to configure storage settings for images and videos)
        $imagePaths = [];
        $videoPaths = [];

      if ($request->hasFile('first_image_url') && $request->file('first_image_url')->isValid()) {
        
        $imagePaths['first_image_url'] = $request->file('first_image_url')->store('images', 'public');
        
        }

        if ($request->hasFile('second_image_url')) {
            $imagePaths['second_image_url'] = $request->file('second_image_url')->store('images', 'public');
        }

        if ($request->hasFile('third_image_url')) {
            $imagePaths['third_image_url'] = $request->file('third_image_url')->store('images', 'public');
        }

        if ($request->hasFile('fourth_image_url')) {
            $imagePaths['fourth_image_url'] = $request->file('fourth_image_url')->store('images', 'public');
        }

        if ($request->hasFile('first_video_url')) {
            $videoPaths['first_video_url'] = $request->file('first_video_url')->store('videos', 'public');
        }

        if ($request->hasFile('second_video_url')) {
            $videoPaths['second_video_url'] = $request->file('second_video_url')->store('videos', 'public');
        }

        // Create and store the HarbourLocation model
        $harbourLocation = new Habour();
        $harbourLocation->slug = $request->slug;
        $harbourLocation->location_data = $request->location_data;
        $harbourLocation->first_website_url = $request->first_website_url;
        $harbourLocation->first_site_duration = $request->first_site_duration;
        $harbourLocation->second_website_url = $request->second_website_url;
        $harbourLocation->second_site_duration = $request->second_site_duration;
        $harbourLocation->third_website_url = $request->third_website_url;
        $harbourLocation->third_site_duration = $request->third_site_duration;
        $harbourLocation->fourth_website_url = $request->fourth_website_url;
        $harbourLocation->fourth_site_duration = $request->fourth_site_duration;
        $harbourLocation->fifth_website_url = $request->fifth_website_url;
        $harbourLocation->fifth_site_duration = $request->fifth_site_duration;
        $harbourLocation->sixth_website_url = $request->sixth_website_url;
        $harbourLocation->sixth_site_duration = $request->sixth_site_duration;
        $harbourLocation->seventh_website_url = $request->seventh_website_url;
        $harbourLocation->seventh_site_duration = $request->seventh_site_duration;

        // Assign image and video paths to model attributes
        $appUrl = env('APP_URL');
        $harbourLocation->first_image_url = $appUrl .'/storage/'.$imagePaths['first_image_url'] ?? null;
        $harbourLocation->second_image_url = $imagePaths['second_image_url'] ?? null;
        $harbourLocation->third_image_url = $imagePaths['third_image_url'] ?? null;
        $harbourLocation->fourth_image_url = $imagePaths['fourth_image_url'] ?? null;

        $harbourLocation->first_image_play_duration = $request->first_image_play_duration;
        $harbourLocation->second_image_play_duration = $request->second_image_play_duration;
        $harbourLocation->third_image_play_duration = $request->third_image_play_duration;
        $harbourLocation->fourth_image_play_duration = $request->fourth_image_play_duration;

        $harbourLocation->text_decription = $request->text_description;
        $harbourLocation->text_font_size = $request->text_font_size;
        $harbourLocation->text_font_colour = $request->text_font_colour;
        $harbourLocation->text_background_colour = $request->text_background_colour;
        $harbourLocation->text_decription_duration = $request->text_description_duration;

        $harbourLocation->first_video_url = $videoPaths['first_video_url'] ?? null;
        $harbourLocation->first_video_play_duration = $request->first_video_play_duration;
        $harbourLocation->first_video_url = $videoPaths['first_video_url'] ?? null;
        $harbourLocation->first_video_play_duration = $request->first_video_play_duration;
        $harbourLocation->second_video_url = $videoPaths['second_video_url'] ?? null;
        $harbourLocation->second_video_play_duration = $request->second_video_play_duration;
        // Add other fields similarly

        // Save the model to the database
        $harbourLocation->save();

  
        Alert::success('Success', 'Habour location added successfully!'); 
        return redirect()->route('habour-location.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habour $habour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $location = Habour::findOrFail($id);
        return view('pages.habour_edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
        // Your validation rules for other fields
        'first_image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
        // Handle image and video uploads (you may need to configure storage settings for images and videos)
        $imagePaths = [];
        $videoPaths = [];

      if ($request->hasFile('first_image_url') && $request->file('first_image_url')->isValid()) {
        
        $imagePaths['first_image_url'] = $request->file('first_image_url')->store('images', 'public');
        
        }

        if ($request->hasFile('second_image_url')) {
            $imagePaths['second_image_url'] = $request->file('second_image_url')->store('images', 'public');
        }

        if ($request->hasFile('third_image_url')) {
            $imagePaths['third_image_url'] = $request->file('third_image_url')->store('images', 'public');
        }

        if ($request->hasFile('fourth_image_url')) {
            $imagePaths['fourth_image_url'] = $request->file('fourth_image_url')->store('images', 'public');
        }

        if ($request->hasFile('first_video_url')) {
            $videoPaths['first_video_url'] = $request->file('first_video_url')->store('videos', 'public');
        }

        if ($request->hasFile('second_video_url')) {
            $videoPaths['second_video_url'] = $request->file('second_video_url')->store('videos', 'public');
        }

        // Create and store the HarbourLocation model
        $harbourLocation = Habour::find($id);

        if (!$harbourLocation) {
            return redirect()->back()->with('error', 'Habour location not found!');
        }
        $harbourLocation->slug = $request->slug;
        $harbourLocation->location_data = $request->location_data;
        $harbourLocation->first_website_url = $request->first_website_url;
        $harbourLocation->first_site_duration = $request->first_site_duration;
        $harbourLocation->second_website_url = $request->second_website_url;
        $harbourLocation->second_site_duration = $request->second_site_duration;
        $harbourLocation->third_website_url = $request->third_website_url;
        $harbourLocation->third_site_duration = $request->third_site_duration;
        $harbourLocation->fourth_website_url = $request->fourth_website_url;
        $harbourLocation->fourth_site_duration = $request->fourth_site_duration;
        $harbourLocation->fifth_website_url = $request->fifth_website_url;
        $harbourLocation->fifth_site_duration = $request->fifth_site_duration;
        $harbourLocation->sixth_website_url = $request->sixth_website_url;
        $harbourLocation->sixth_site_duration = $request->sixth_site_duration;
        $harbourLocation->seventh_website_url = $request->seventh_website_url;
        $harbourLocation->seventh_site_duration = $request->seventh_site_duration;

        // Assign image and video paths to model attributes
        $appUrl = env('APP_URL');
        $harbourLocation->first_image_url = $appUrl .'/storage/'.$imagePaths['first_image_url'] ?? null;
        $harbourLocation->second_image_url = $imagePaths['second_image_url'] ?? null;
        $harbourLocation->third_image_url = $imagePaths['third_image_url'] ?? null;
        $harbourLocation->fourth_image_url = $imagePaths['fourth_image_url'] ?? null;

        $harbourLocation->first_image_play_duration = $request->first_image_play_duration;
        $harbourLocation->second_image_play_duration = $request->second_image_play_duration;
        $harbourLocation->third_image_play_duration = $request->third_image_play_duration;
        $harbourLocation->fourth_image_play_duration = $request->fourth_image_play_duration;

        $harbourLocation->text_decription = $request->text_description;
        $harbourLocation->text_font_size = $request->text_font_size;
        $harbourLocation->text_font_colour = $request->text_font_colour;
        $harbourLocation->text_background_colour = $request->text_background_colour;
        $harbourLocation->text_decription_duration = $request->text_description_duration;

        $harbourLocation->first_video_url = $videoPaths['first_video_url'] ?? null;
        $harbourLocation->first_video_play_duration = $request->first_video_play_duration;
        $harbourLocation->first_video_url = $videoPaths['first_video_url'] ?? null;
        $harbourLocation->first_video_play_duration = $request->first_video_play_duration;
        $harbourLocation->second_video_url = $videoPaths['second_video_url'] ?? null;
        $harbourLocation->second_video_play_duration = $request->second_video_play_duration;
        //
        Alert::success('Success', 'Habour location update successfully!'); 
        return redirect()->back()->with('success', 'Location updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $harbourLocation = Habour::find($id);

    if (!$harbourLocation) {
        Alert::warning('Warning','Habour location not found!');
        return redirect()->back()->with('error', 'Habour location not found!');
    }

    // Delete the habour location
    $harbourLocation->delete();
    Alert::success('Success', 'Habour location deleted successfully!'); 
    return redirect()->back()->with('success', 'Habour location deleted successfully!');
    }
}
