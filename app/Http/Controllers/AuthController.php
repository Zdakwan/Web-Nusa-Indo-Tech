<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\LoginLog;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ], [
            'login.required' => 'Email atau Username wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        $login = trim($validated['login']);
        $ipAddress = $request->ip();

        // Kunci untuk menghitung jumlah salah (7x) & kunci untuk timer hukuman 60 detik
        $attemptKey = 'client-attempts:' . Str::lower($login) . '|' . $ipAddress;
        $lockoutKey = 'client-lockout:' . Str::lower($login) . '|' . $ipAddress;

        // 1. Cek apakah sedang dalam masa hukuman 60 detik
        if (RateLimiter::tooManyAttempts($lockoutKey, 1)) {
            $seconds = RateLimiter::availableIn($lockoutKey);

            return back()
                ->with('error', "Terlalu banyak percobaan login gagal (7x). Silakan tunggu {$seconds} detik lagi sebelum mencoba kembali.")
                ->withInput($request->only('login'));
        }

        $client = Client::where('email', $login)
            ->orWhere('username', $login)
            ->first();

        $identifier = $client ? $client->email : $login;

        // 2. Verifikasi login
        if (
            $client &&
            Auth::guard('client')->attempt([
                'email' => $client->email,
                'password' => $validated['password'],
            ])
        ) {
            RateLimiter::clear($attemptKey);
            RateLimiter::clear($lockoutKey);

            LoginLog::create([
                'email'      => $identifier,
                'role'       => 'client',
                'ip_address' => $ipAddress,
                'status'     => 'Berhasil'
            ]);

            $request->session()->regenerate();
            return redirect()->intended('dashboard')
                ->with('success', 'Selamat datang, ' . $client->name . '!');
        }

        // 3. Catat log gagal Client
        LoginLog::create([
            'email'      => $identifier,
            'role'       => 'client',
            'ip_address' => $ipAddress,
            'status'     => 'Gagal'
        ]);

        // Tambah 1 hitungan salah
        RateLimiter::hit($attemptKey, 600);
        $sisaPercobaan = RateLimiter::retriesLeft($attemptKey, 7); // Batas Public/Client = 7 kali

        // Jika sudah salah 7 kali, aktifkan timer hukuman MURNI 60 DETIK dari sekarang!
        if ($sisaPercobaan <= 0) {
            RateLimiter::clear($attemptKey); // Reset hitungan agar setelah 60 detik kembali punya 7 kesempatan
            RateLimiter::hit($lockoutKey, 60); // Kunci tepat 60 detik penuh!

            $pesanError = "Anda telah salah memasukkan password 7 kali. Silakan tunggu 60 detik untuk mencoba lagi.";
        } else {
            $pesanError = "Username, email, atau password salah. Sisa percobaan: {$sisaPercobaan} kali lagi.";
        }

        return back()
            ->with('error', $pesanError)
            ->withInput($request->only('login'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

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
            'no_telp' => [
                'required',
                'string',
                'min:10',
                'max:13',
                'regex:/^[0-9]+$/',
            ],
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
        ], [
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

        Client::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Akun berhasil dibuat! Silakan login menggunakan username atau email dan password Anda.');
    }

    public function logout(Request $request)
    {
        $client = Auth::guard('client')->user();

        if ($client) {
            LoginLog::create([
                'email'      => $client->email,
                'role'       => 'client',
                'ip_address' => $request->ip(),
                'status'     => 'Logout'
            ]);
        }

        Auth::guard('client')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Anda telah berhasil keluar dari akun Anda.');
    }
}