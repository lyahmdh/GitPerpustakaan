<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginUserController;
use App\Http\Controllers\API\Auth\LoginAdminController;
use App\Http\Controllers\API\Auth\RegisterAdminController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\RiwayatController;
use App\Http\Controllers\API\PengembalianController;

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

// ================= Riwayat dan pengembalian =================
Route::get('/riwayat/{id_user}', [RiwayatController::class, 'index']);
Route::put('/pengembalian/{id}', [PengembalianController::class, 'kembalikan']);
