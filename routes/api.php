<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\JobController;

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
});