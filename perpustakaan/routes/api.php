<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginUserController;
use App\Http\Controllers\API\Auth\LoginAdminController;
use App\Http\Controllers\API\Auth\RegisterAdminController;
use App\Http\Controllers\API\BukuController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ================= USER LOGIN =================

Route::post('/login-user', [LoginUserController::class, 'login']);


// ================= ADMIN LOGIN =================

Route::post('/login-admin', [LoginAdminController::class, 'login']);


// ================= REGISTER ADMIN =================

Route::post('/register-admin', [RegisterAdminController::class, 'register']);

// ================= BUKU =================
Route::get('/bukus', [BukuController::class, 'index']);
Route::get('/bukus/search', [BukuController::class, 'search']);
Route::get('/bukus/{id}', [BukuController::class, 'show']);

Route::post('/bukus', [BukuController::class, 'store']);
Route::put('/bukus/{id}', [BukuController::class, 'update']);
Route::delete('/bukus/{id}', [BukuController::class, 'destroy']);