<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek kredensial untuk login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Periksa peran pengguna dan arahkan ke halaman sesuai peran
            $role = Auth::user()->role;

            // Pastikan pengalihan dilakukan sesuai role
            if ($role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($role === 'user') {
                return redirect()->intended('/user/home');
            } else {
                // Jika peran tidak dikenali, redirect ke halaman default
                return redirect('/');
            }
        }

        // Jika login gagal, lemparkan pesan error
        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'alamat'   => 'required',
            'no_telp'  => 'required',
        ]);

        $user = User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // default role
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
        ]);

        Auth::login($user);

        return redirect('/user/home');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
