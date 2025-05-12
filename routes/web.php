<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\FishersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HabourController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LocationUserController;
use App\Http\Controllers\FileManager;


/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



Route::get('/', function () {

    return view('auth.login');
});

Route::get('/wp-json/app/api/harbour_locations', [ApiController::class, 'getHarbourLocations']);
// Route::get('/fishers', function () {

//     return view('auth.login');
// });
Route::get('live/fishers', [FishersController::class, 'fishers'])->name('live.fishers');
Route::get('insurance', [EmailsController::class,'insurance'])->name('emails.insurance');

Route::get('live/fishers/si', [FishersController::class, 'fishersSi'])->name('live.fishers.si');
Route::get('insurance/si', [EmailsController::class,'insuranceSi'])->name('emails.insurance.si');

Route::get('live/fishers/ta', [FishersController::class, 'fishersTa'])->name('live.fishers.ta');
Route::get('insurance/ta', [EmailsController::class,'insuranceTa'])->name('emails.insurance.ta');

Route::post('insurance/store', [ContactController::class,'store'])->name('insurances.store');

Route::resource('emails', EmailsController::class);

Auth::routes();




/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {


    Route::get('/fishers', [FishersController::class, 'index'])->name('fishers.index');
    Route::get('/fishers/create', [FishersController::class, 'create'])->name('fishers.create');
    Route::post('/fishers', [FishersController::class, 'store'])->name('fishers.store');
    Route::get('/fishers/{id}/edit', [FishersController::class, 'edit'])->name('fishers.edit');
    Route::put('/fishers/{id}', [FishersController::class, 'update'])->name('fishers.update');
    Route::delete('/fishers/{id}', [FishersController::class, 'destroy'])->name('fishers.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {



    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/register', [HomeController::class, 'register'])->name('admin.register');
    Route::post('/admin/register/save', [HomeController::class, 'store'])->name('admin.register.save');

    Route::post('/admin/assign-location', [LocationUserController::class, 'store'])->name('assign.location');

    Route::get('/admin/users', [HomeController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{id}', [HomeController::class, 'users_edit'])->name('admin.users_edit');
    Route::put('/admin/users/{id}', [HomeController::class, 'users_update'])->name('admin.users_update');
    Route::delete('/admin/users/{id}', [HomeController::class, 'users_destroy'])->name('admin.users_destroy');
    Route::resource('/admin/habour-location', HabourController::class);
    
});



/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {



    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

//Globle Routes

