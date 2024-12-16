<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'school' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'city' => 'required',
            'phone' => 'required|digits_between:10,13',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'school' => $request->school,
            'gender' => $request->gender,
            'province' => $request->province,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/masuk')->with('success', 'Pendaftaran berhasil!');
    }

    // Login user
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah admin atau pengguna biasa
        if ($request->email == 'admin@gmail.com' && $request->password == 'admin') {
            // Manual login untuk admin
            Auth::loginUsingId(1); // Anggap ID admin adalah 1
            return redirect('/admin'); // Redirect ke halaman admin
        }

        // Login untuk pengguna biasa
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/'); // Redirect ke halaman home atau yang sesuai
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show login form
    public function showLoginForm()
    {
        return view('masuk');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        // Clear session data and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page after logout
        return redirect('/masuk');
    }
}