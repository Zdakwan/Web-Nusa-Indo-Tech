<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\Client;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses login menggunakan username atau email
    public function login(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $login = trim($validated['login']);

        // Cari akun berdasarkan email atau username
        $client = Client::where('email', $login)
            ->orWhere('username', $login)
            ->first();

        // Verifikasi password menggunakan autentikasi Laravel
        if (
            $client &&
            Auth::guard('client')->attempt([
                'email' => $client->email,
                'password' => $validated['password'],
            ])
        ) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()
            ->with('error', 'Username, email, atau password yang Anda masukkan salah. Silakan coba lagi.')
            ->withInput($request->only('login'));
    }

    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses registrasi client
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'alpha_dash',
                'unique:clients,username',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:clients,email',
            ],
            'phone' => ['required', 'string', 'max:20'],
            'password' => [
                'required',
                'confirmed',
                Password::min(6),
            ],
        ]);

        // Simpan akun baru ke database
        Client::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        // Arahkan pengguna ke login setelah registrasi berhasil
        return redirect()
            ->route('login')
            ->with('success', 'Akun berhasil dibuat! Silakan login menggunakan username atau email dan password Anda.');
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