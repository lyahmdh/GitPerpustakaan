<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterAdminController;
use App\Http\Controllers\Auth\LoginAdminController;


Route::get('/', function () {
    return view('welcome');
});

// ================= USER LOGIN =================

Route::get('/login-user', [LoginUserController::class, 'index']);
Route::post('/login-user', [LoginUserController::class, 'login']);


// ================= ADMIN LOGIN =================

Route::get('/login-admin', [LoginAdminController::class, 'index']);
Route::post('/login-admin', [LoginAdminController::class, 'login']);


// ================= REGISTER ADMIN =================

Route::get('/register-admin', [RegisterAdminController::class, 'index']);
Route::post('/register-admin', [RegisterAdminController::class, 'register']);


// ================= LOGOUT =================

Route::get('/logout', function () {
    session()->flush();
    return redirect('/login-user');
});


// ================= DASHBOARD =================

Route::get('/dashboard-user', function () {
    return view('dashboard');
})->middleware('user.auth');

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
})->middleware('admin.auth');