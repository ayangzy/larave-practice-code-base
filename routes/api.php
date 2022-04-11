<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\PaymentMethodController;

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
Route::post('generarteKey', [LoginController::class, 'generarteKey']);

Route::middleware('auth:sanctum')->group(static function(){
    Route::prefix('users')->name('user.')->group(function () {
        Route::post('/logout', LogoutController::class);
        Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    });
    
});

Route::prefix('orders')->name('order.')->group(function(){
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{id}', [OrderController::class, 'show']);
    Route::post('/', [OrderController::class, 'store']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});

Route::post('payment', [PaymentController::class, 'initiatePayment']);

Route::prefix('payment-methods')->name('payment_method.')->group(function(){
    Route::get('/', [PaymentMethodController::class, 'index'])->name('index');
    Route::post('/', [PaymentMethodController::class, 'store'])->name('store');
});






