<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FishersController extends Controller
{
    public function fishers(){
        return view('pages.fishers');
    }
}
