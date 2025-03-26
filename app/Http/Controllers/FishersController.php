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
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('fishers', 'public');

        Fishers::create([
            'name' => $request->name,
            'image' => $imagePath
        ]);
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

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($fisher->image);
            $imagePath = $request->file('image')->store('fishers', 'public');
            $fisher->image = $imagePath;
        }

        if ($request->has('name')) {
            $fisher->name = $request->name;
        }

        $fisher->save();
        Alert::success('Success', 'Fisher update successfully!'); 
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

}
