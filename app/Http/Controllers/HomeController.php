<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {

        $this->middleware('auth');
    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index(): View

    {

        return view('home');
    }


    public function register(): View

    {

        return view('auth.register');
    }


    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'account_type' => 'required|in:1,2', // Assuming 'account_type' should be 1 or 2
        'password' => 'required|min:6|confirmed',
    ]);

    // Create a new user instance
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->type = $validatedData['account_type'];
    $user->password = bcrypt($validatedData['password']);
    
    // Save the user to the database
    $user->save();

    Alert::success('Success', 'Account added successfully!'); 
    return redirect()->route('admin.users')->with('success', 'Account added successfully!');

}


        public function users(){
            if(Auth::user()->type == 'admin'){
                    $users = User::paginate(10);
                }else{
                    
                }
          return view('pages.users',compact('users'));
        }
    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome(): View

    {

        return view('adminHome');
    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function managerHome(): View

    {

        return view('managerHome');
    }
}
