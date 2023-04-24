<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\JobController;

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
    return view('index');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pilots', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(auth()->user()->type == 'admin'){
		return view('pilots.admin-pilot-list');
	}else{
		return view('pilots.pilot-list');
	}
});

Route::get('/customer', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(auth()->user()->type == 'admin'){
		return view('customer.admin-customer-list');
	}else{
		return view('customer.customer-list');
	}
});

Route::get('/pilot-verification', [PilotController::class, 'show']);
Route::get('/job-create', [JobController::class, 'create']);
Route::get('/jobs', [JobController::class, 'show']);
Route::get('/job/{id}', [JobController::class, 'edit']);

Route::get('/admin-login', [LoginController::class, 'index']);
// Route::get('/admin-registration', [RegisterController::class, 'index']);

// Google login
Route::get('login/google', [LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class,'handleGoogleCallback']);

//facebook login
Route::get('login/facebook', [LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class,'handleFacebookCallback']);

//Twitter Login
Route::get('login/twitter', [LoginController::class,'redirectToTwitter'])->name('login.twitter');
Route::get('login/twitter/callback', [LoginController::class,'handleTwitterCallback']);

Route::get('cache-clear', function(){
	\Artisan::call('cache:clear');
	\Artisan::call('config:cache');
	\Artisan::call('route:clear');
	\Artisan::call('view:clear');
	dd('cache cleared!');
});
    
Route::get('/storage-link', function () { 
    Artisan::call('storage:link');
});