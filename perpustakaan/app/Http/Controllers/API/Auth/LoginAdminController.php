<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginAdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {

            return response()->json([
                'success' => false,
                'message' => 'Username atau password salah'
            ], 401);

        }

        return response()->json([
            'success' => true,
            'message' => 'Login admin berhasil',
            'data' => $admin
        ]);
    }
}