<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [\App\Http\Controllers\api\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\api\AuthController::class, 'register']);
Route::post('/verify-registration', [\App\Http\Controllers\api\AuthController::class, 'verifyRegistration']);
Route::post('/forgot-password', [\App\Http\Controllers\api\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [\App\Http\Controllers\api\ForgotPasswordController::class, 'reset']);