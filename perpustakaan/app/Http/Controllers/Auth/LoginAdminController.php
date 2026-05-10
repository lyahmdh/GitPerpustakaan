<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('auth.login-admin');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            session([
                'admin' => $admin
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }
}