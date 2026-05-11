<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginUserController;
use App\Http\Controllers\API\Auth\LoginAdminController;
use App\Http\Controllers\API\Auth\RegisterAdminController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\RiwayatController;
use App\Http\Controllers\API\PengembalianController;


<<<<<<< Updated upstream
// ================= USER LOGIN =================
Route::post('/login-user', [LoginUserController::class, 'login']);

// ================= ADMIN LOGIN =================
Route::post('/login-admin', [LoginAdminController::class, 'login']);


// ================= REGISTER ADMIN =================
=======
// ======================================================
// PUBLIC ROUTES
// ======================================================


// ================= AUTH =================
Route::post('/login-user', [LoginUserController::class, 'login']);
Route::post('/login-admin', [LoginAdminController::class, 'login']);
>>>>>>> Stashed changes
Route::post('/register-admin', [RegisterAdminController::class, 'register']);


// ================= BUKU =================
// lihat semua buku
Route::get('/bukus', [BukuController::class, 'index']);
// search buku
Route::get('/bukus/search', [BukuController::class, 'search']);
// detail buku
Route::get('/bukus/{id}', [BukuController::class, 'show']);

<<<<<<< Updated upstream
Route::post('/bukus', [BukuController::class, 'store']);
Route::put('/bukus/{id}', [BukuController::class, 'update']);
Route::delete('/bukus/{id}', [BukuController::class, 'destroy']);

// ================= Riwayat dan pengembalian =================
Route::get('/riwayat/{id_user}', [RiwayatController::class, 'index']);
Route::put('/pengembalian/{id}', [PengembalianController::class, 'kembalikan']);
=======

// ======================================================
// PROTECTED ROUTES
// ======================================================
Route::middleware('auth:sanctum')->group(function () {

    // ================= USER LOGIN CHECK =================
    Route::get('/user', function (Request $request) {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
    });

    // ================= LOGOUT =================
    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    });

    // ================= PEMINJAMAN =================
    // semua transaksi
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    // detail transaksi
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);
    // tambah transaksi
    Route::post('/peminjaman', [PeminjamanController::class, 'store']);

    // ================= RIWAYAT =================
    Route::get('/riwayat/{id_user}', [RiwayatController::class, 'index']);

    // ================= PENGEMBALIAN =================
    Route::put('/pengembalian/{id}', [PengembalianController::class, 'kembalikan']);

});
>>>>>>> Stashed changes
