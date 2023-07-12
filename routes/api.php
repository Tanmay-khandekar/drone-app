<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SettingController;
// use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->group(function() {
    Route::post('users/update', [UserController::class,'update']);
    Route::get('/users', [UserController::class,'index']);

    Route::get('/pilots', [PilotController::class, 'index']);
    Route::get('pilot/edit/{id}', [PilotController::class,'edit']);
    Route::post('pilot/update', [PilotController::class,'update']);

    Route::get('jobs', [JobController::class,'index']);
    Route::post('job/create', [JobController::class,'store']);
    Route::post('states-by-country',[LocationController::class,'statesByCountry'])->name('states_by_country');
    Route::post('city-by-states',[LocationController::class,'cityByStates'])->name('city_by_states');
    
    Route::post('bid/create', [BidController::class,'store']);
    Route::get('bids/{id}', [BidController::class,'show']);
    Route::get('bid/{id}', [BidController::class,'edit']);
    Route::post('bids/update/{id}', [BidController::class,'update']);

    Route::get('/payments', [PaymentController::class, 'index']);
    // language API start
    Route::get('/language', [LanguageController::class, 'index']);
    Route::post('/language/store', [LanguageController::class, 'store']);
    Route::get('language/edit/{key}', [LanguageController::class,'edit']);
    Route::post('language/update', [LanguageController::class,'update']);
    // language API end
    
    Route::post('/stripe/auto-payment', [StripeController::class,'stripePyament'])->name("stripe.autopost");
    
    Route::get('settings', [SettingController::class,'index']);

});