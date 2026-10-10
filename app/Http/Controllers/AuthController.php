<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Proses autentikasi menggunakan guard 'client'
        if (Auth::guard('client')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect ke halaman dashboard setelah sukses login
            return redirect()->intended('dashboard');
        }

        // Kembali ke halaman login dengan pesan error jika gagal
        return back()->with('error', 'Username atau password yang anda masukkan salah. Silahkan coba lagi')->withInput();
    }

    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses data register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'min:6'],
        ]);

        // Simpan data ke database
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // Password di-hash
        ]);

        // Arahkan kembali ke halaman login dengan membawa pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login menggunakan email dan password Anda.');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
