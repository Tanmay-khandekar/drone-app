<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StripeController;

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
//Frount pages
Route::get('/', function () {
    return view('index');
});
Route::get('/how-it-works', function () {
    return view('how-it-works.index');
});
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/blog', function () {
    return view('blog.index');
});
Auth::routes();
Route::get('/browse-pilots', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(Auth::check()){
		return view('browse-pilots.index');
	}
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);

//language start
Route::get('/language', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(auth()->user()->type == 'admin'){
		return view('language.language-list');
	}
});
Route::get('/language/create', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(auth()->user()->type == 'admin'){
		return view('language.language-detail');
	}
});
Route::get('/language/{id}', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(auth()->user()->type == 'admin'){
		return view('language.language-detail');
	}
});
// Route::create('language/create', [LanguageController::class, 'create']);
// Route::get('language/{id}', [LanguageController::class, 'edit']);
//language end
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('import-pilot', [PilotController::class, 'import']);
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

Route::get('/pilot/{id}', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
	if(auth()->user()->type == 'admin'){
		return view('pilots.admin-pilot-detail');
	}else{
		return view('pilots.pilot-detail');
	}
});
// Route::get('pilot/{id}', [PilotController::class, 'edit']);

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
Route::get('/payments', function () {
	if(!Auth::check()){
		return redirect("login")->withSuccess('Opps! You do not have access');
	}
    return view('payment.admin-payment-list');
});
Route::get('/payment', function () {
    return view('payment.stripe');
});
Route::post('/stripe', [StripeController::class,'stripePyament'])->name("stripe.post");
Route::get('/notifications', [NotificationController::class,'show'])->name('notifications');
Route::get('/notify', [NotificationController::class,'create']);
Route::get('/mark-as-read/{id}', [NotificationController::class,'update']);

Route::get('/resend-code', [RegisterController::class, 'resend']);

Route::get('/pilot-verification', [PilotController::class, 'show']);
Route::get('/job-create', [JobController::class, 'create']);
Route::get('/jobs', [JobController::class, 'show']);
Route::get('/job/{id}', [JobController::class, 'edit']);

Route::get('/admin-login', [LoginController::class, 'index']);
// Route::get('/admin-registration', [RegisterController::class, 'index']);

Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');

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