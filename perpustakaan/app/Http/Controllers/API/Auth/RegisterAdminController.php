<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admin',
            'password' => 'required|min:6'
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi admin berhasil',
            'data' => $admin
        ], 201);
    }
}