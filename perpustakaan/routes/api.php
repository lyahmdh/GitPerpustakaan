<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginUserController;
use App\Http\Controllers\API\Auth\LoginAdminController;
use App\Http\Controllers\API\Auth\RegisterAdminController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ================= USER LOGIN =================

Route::post('/login-user', [LoginUserController::class, 'login']);


// ================= ADMIN LOGIN =================

Route::post('/login-admin', [LoginAdminController::class, 'login']);


// ================= REGISTER ADMIN =================

Route::post('/register-admin', [RegisterAdminController::class, 'register']);