<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPerpustakaan;

class LoginUserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required'
        ]);

        $user = UserPerpustakaan::where('nim', $request->nim)
                    ->where('nama', $request->nama)
                    ->first();

        if (!$user) {

            return response()->json([
                'success' => false,
                'message' => 'Login gagal'
            ], 401);

        }

        $token = $user->createToken('user-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'role' => $user->role,
            'data' => $user
        ]);
    }
}