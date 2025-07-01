<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form register
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->role === 'admin' ? '/admin/dashboard' : '/member/dashboard');
        }
        
        return view('pages.auth.register', [
            'title' => 'Register'
        ]);
    }

    // Proses register
    public function register(Request $request)
    {

        $messages = [
            'email.regex' => 'Tolong masukkan email dengan benar',
            'password.regex' => 'Password harus mengandung 6 karakter meliputi huruf dan angka.'
        ];

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|net|co.id|ac.id)$/',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:6',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[A-Za-z]/', $value)) {
                        $fail('Password harus mengandung minimal 1 huruf.');
                    }
                    if (!preg_match('/\d/', $value)) {
                        $fail('Password harus mengandung minimal 1 angka.');
                    }
                },
                'confirmed'
            ]
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'member'
        ]);
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->role === 'admin' ? '/admin/dashboard' : '/member/dashboard');
        }
        
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/member/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
