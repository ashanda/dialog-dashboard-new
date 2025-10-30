<?php

namespace App\Http\Controllers;

use App\Models\Fishers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FishersController extends Controller
{

    public function index(){
        $fishers = Fishers::get();
        return view("fishers.index",compact("fishers"));
    }
   
    public function create()
    {
        return view('fishers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sinhala_name' => 'required|string|max:255',
            'english_name' => 'required|string|max:255',
            'tamil_name'   => 'required|string|max:255',
            'image_day1'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_day2'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_day3'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_day4'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_day5'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'sinhala_name' => $request->sinhala_name,
            'english_name' => $request->english_name,
            'tamil_name'   => $request->tamil_name,
        ];

        // loop through all day images and store if present
        for ($i = 1; $i <= 5; $i++) {
            $field = "image_day{$i}";
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('fishers', 'public');
            }
        }

        // Optionally set the first image as the main one
        if (!empty($data['image_day1'])) {
            $data['image'] = $data['image_day1'];
        }

        Fishers::create($data);

        Alert::success('Success', 'Fisher created successfully!');
        return redirect()->route('fishers.index');
    }


    public function edit($id)
    {
        $fisher = Fishers::findOrFail($id);
        return view('fishers.edit', compact('fisher'));
    }

    public function update(Request $request, $id)
    {
        $fisher = Fishers::findOrFail($id);

        // ✅ Validate inputs
        $request->validate([
            'sinhala_name' => 'sometimes|required|string|max:255',
            'english_name' => 'sometimes|required|string|max:255',
            'tamil_name'   => 'sometimes|required|string|max:255',
            'image_day1'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_day2'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_day3'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_day4'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_day5'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ✅ Update text fields
        $fisher->fill($request->only(['sinhala_name', 'english_name', 'tamil_name']));

        // ✅ Handle up to 5 images
        for ($i = 1; $i <= 5; $i++) {
            $field = "image_day{$i}";

            if ($request->hasFile($field)) {
                // Delete old image if exists
                if (!empty($fisher->$field) && Storage::disk('public')->exists($fisher->$field)) {
                    Storage::disk('public')->delete($fisher->$field);
                }

                // Store new image
                $fisher->$field = $request->file($field)->store('fishers', 'public');
            }
        }

        // ✅ Save updates
        $fisher->save();

        Alert::success('Success', 'Fisher updated successfully!');
        return redirect()->route('fishers.index');
    }

    public function destroy($id)
    {
        $fisher = Fishers::findOrFail($id);
        Storage::disk('public')->delete($fisher->image);
        $fisher->delete();
        Alert::success('Success', 'Fisher deleted successfully!'); 
        return redirect()->route('fishers.index');
    }

    public function fishers(){
        $allFishers = Fishers::get();
        return view('pages.fishers', compact('allFishers'));
    }
    public function fishersSi(){
        $allFishers = Fishers::get();
        return view('pages.fishersSi', compact('allFishers'));
    }
    public function fishersTa(){
        $allFishers = Fishers::get();
        return view('pages.fishersTa', compact('allFishers'));
    }

}
