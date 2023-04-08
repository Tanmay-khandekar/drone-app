<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
// Google login
Route::get('login/google', [LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('public/login/google/callback', [LoginController::class,'handleGoogleCallback']);

//facebook login
Route::get('login/facebook', [LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('public/login/facebook/callback', [LoginController::class,'handleFacebookCallback']);

//Twitter Login
Route::get('login/twitter', [LoginController::class,'redirectToTwitter'])->name('login.twitter');
Route::get('public/login/twitter/callback', [LoginController::class,'handleTwitterCallback']);

Route::get('/cache', function () { 
    Artisan::call('cache:clear');
});
    
Route::get('/storage-link', function () { 
    Artisan::call('storage:link');
});