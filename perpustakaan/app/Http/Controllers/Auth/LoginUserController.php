<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPerpustakaan;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('auth.login-user');
    }

    public function login(Request $request)
    {
        $user = UserPerpustakaan::where('nim', $request->nim)
                    ->where('nama', $request->nama)
                    ->first();

        if ($user) {

            session([
                'user' => $user
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }
}