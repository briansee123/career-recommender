<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ============================
    // USER SIGNUP
    // ============================
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',  // default
        ]);

        return redirect('/user/login')->with('success', 'Signup successful! Please login.');
    }

    // ============================
    // USER LOGIN
    // ============================
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/user/home');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // ============================
    // LOGOUT
    // ============================
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/user/login');
    }
}
