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

// ======================================================
// PUBLIC ROUTES
// ======================================================

// ================= AUTH =================

// login user
Route::post('/login-user', [LoginUserController::class,'login']);

// login admin
Route::post('/login-admin', [
    LoginAdminController::class,
    'login'
]);

// register admin
Route::post('/register-admin', [
    RegisterAdminController::class,
    'register'
]);

// ======================================================
// SHARED PROTECTED ROUTES
// admin & user
// ======================================================

Route::middleware('auth:sanctum')->group(function () {

    // ================= LOGIN CHECK =================

    Route::get('/user', function (Request $request) {

        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);

    });

    // ================= LOGOUT =================

    Route::post('/logout', function (Request $request) {

        $request->user()
                ->currentAccessToken()
                ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);

    });

    // ================= BUKU =================

    // tampil semua buku
    Route::get('/buku', [
        BukuController::class,
        'index'
    ]);

    // search buku
    Route::get('/buku/search', [
        BukuController::class,
        'search'
    ]);

    // detail buku
    Route::get('/buku/{id}', [
        BukuController::class,
        'show'
    ]);

});

// ======================================================
// USER ROUTES
// ======================================================

Route::middleware([
    'auth:sanctum',
    'role:user'
])->group(function () {

    // ================= RIWAYAT =================

    Route::get('/riwayat/{id_user}', [
        RiwayatController::class,
        'index'
    ]);

});

// ======================================================
// ADMIN ROUTES
// ======================================================

Route::middleware([
    'auth:sanctum',
    'role:admin'
])->group(function () {

    // ================= PEMINJAMAN =================

    // tampil semua transaksi
    Route::get('/peminjaman', [
        PeminjamanController::class,
        'index'
    ]);

    // detail transaksi
    Route::get('/peminjaman/{id}', [
        PeminjamanController::class,
        'show'
    ]);

    // tambah transaksi
    Route::post('/peminjaman', [
        PeminjamanController::class,
        'store'
    ]);

    // ================= PENGEMBALIAN =================

    Route::put('/pengembalian/{id}', [
        PengembalianController::class,
        'kembalikan'
    ]);

});