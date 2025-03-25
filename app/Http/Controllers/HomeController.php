<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;
use App\Models\Habour;
use Illuminate\Support\Facades\DB;
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
                    $users = User::where('type',2)->paginate(10);
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

// echo $response;
$harbourLocations = DB::table('habours')
    ->select('latitude as lat ', 'longitude as lng')
    ->where('latitude', '!=', null)
    ->where('longitude', '!=', null)
    ->get();

        $locationsArray = $harbourLocations->toArray();

// Convert the array to a JSON string
$location_json = json_encode($locationsArray);
        return view('adminHome',compact('location_json'));
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


    public function users_edit($id){
         $user = User::findOrFail($id);
         return view('pages.user_edit',compact('user'));
    }


    public function users_update(Request $request, $id){

         $user = User::findOrFail($id);
         $user->name =  $request->name;
         $user->email =  $request->email;
         $user->type =  $request->account_type;
         $user->password = bcrypt( $request->password);
            
         // Save the user to the database
         $user->save();
         Alert::success('Success', 'User update successfully!'); 
         return redirect()->route('admin.users');
    }


    public function users_destroy($id){

       $users = User::find($id);

    if (!$users) {
        Alert::warning('Warning','User not found!');
        return redirect()->back()->with('error', 'Habour location not found!');
    }

    // Delete the habour location
    $users->delete();
    Alert::success('Success', 'User deleted successfully!'); 
    return redirect()->back()->with('success', 'Habour location deleted successfully!');
    }


   


}
