<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Register Form
    public function showRegister() {
        return view('auth.register');
    }

    // Handle Registration
    public function register(Request $request) {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user' // Default role set (optional)
        ]);

        // Auto login
        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful. Your ID is ' . $user->id);
    }

    // Show Login Form
    public function showLogin() {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        //dd($credentials, Auth::attempt($credentials)); // 👈 Debug here


        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Welcome, Admin!');
            }

            return redirect('/')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid  Email or Password.');
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
