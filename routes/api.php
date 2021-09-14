<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\User\ProfileController;

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



Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/verify', [VerificationController::class, 'verify']);
Route::post('/login',[LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(static function(){
    Route::prefix('users')->name('user.')->group(function () {
        Route::post('/logout', LogoutController::class);
        Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    });
    
});




