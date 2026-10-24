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

    // Memproses login menggunakan username atau email
    public function login(Request $request)
    {
        // Validasi input login
        $validated = $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ], [
            'login.required' => 'Email atau Username wajib diisi.',
            'password.required' => 'Password wajib diisi.'
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
        // Validasi dan Keamanan Input Register
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
            'no_telp' => [
                'required',
                'string',
                'min:10',             // Minimal 10 digit
                'max:13',             // Maksimal 13 digit
                'regex:/^[0-9]+$/',   // Hanya boleh angka (0-9)
            ],
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',              // Minimal 8 karakter
                'regex:/[a-z]/',      // Harus mengandung huruf kecil
                'regex:/[A-Z]/',      // Harus mengandung huruf besar
                'regex:/[0-9]/',      // Harus mengandung angka
                'regex:/[@$!%*#?&]/', // Harus mengandung karakter spesial
            ],
        ], [
            // Pesan Error Kustom Berbahasa Indonesia
            'username.unique' => 'Username ini sudah digunakan, silakan pilih yang lain.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, strip (-), dan garis bawah (_).',
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau login.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.min' => 'Nomor telepon terlalu pendek, minimal 10 angka.',
            'no_telp.max' => 'Nomor telepon terlalu panjang, maksimal 13 angka.',
            'no_telp.regex' => 'Format nomor telepon tidak valid. Hanya masukkan angka tanpa spasi atau simbol.',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang Anda masukkan.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.regex' => 'Password harus mengandung kombinasi huruf besar, huruf kecil, angka, dan karakter spesial (@$!%*#?&).'
        ]);

        // Simpan akun baru ke database
        Client::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
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
