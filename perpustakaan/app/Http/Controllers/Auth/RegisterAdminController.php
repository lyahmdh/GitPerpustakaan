<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function index()
    {
        return view('auth.register-admin');
    }

    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:admin',
            'password' => 'required|min:6'
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login-admin')
                ->with('success', 'Registrasi berhasil');
    }
}