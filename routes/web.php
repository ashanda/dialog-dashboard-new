<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HabourController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
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

Route::get('/dev/wp-json/app/api/harbour_locations', [ApiController::class, 'getHarbourLocations']);


Auth::routes();



/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {



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
    Route::post('/admin/register', [HomeController::class, 'store'])->name('admin.register');

    Route::get('/admin/users', [HomeController::class, 'users'])->name('admin.users');
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
