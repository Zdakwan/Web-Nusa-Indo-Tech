<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\LoginLog;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        $ipAddress = $request->ip();

        $attemptKey = 'admin-attempts:' . Str::lower($email) . '|' . $ipAddress;
        $lockoutKey = 'admin-lockout:' . Str::lower($email) . '|' . $ipAddress;

        // 1. Cek apakah sedang dalam masa hukuman 60 detik
        if (RateLimiter::tooManyAttempts($lockoutKey, 1)) {
            $seconds = RateLimiter::availableIn($lockoutKey);

            return back()
                ->with('error', "Terlalu banyak percobaan login gagal (3x). Silakan tunggu {$seconds} detik lagi sebelum mencoba kembali.")
                ->withInput($request->only('email'));
        }

        $admin = Admin::where('email', $email)->first();
        $role = $admin ? $admin->role : 'Tidak Diketahui';

        try {
            // 2. Jika berhasil login
            if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
                RateLimiter::clear($attemptKey);
                RateLimiter::clear($lockoutKey);

                LoginLog::create([
                    'email'      => $email,
                    'role'       => $role,
                    'ip_address' => $ipAddress,
                    'status'     => 'Berhasil'
                ]);

                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Selamat datang kembali, ' . ($admin->name ?? 'Admin') . '!');
            }

            // 3. Catat log gagal ke database
            LoginLog::create([
                'email'      => $email,
                'role'       => $role,
                'ip_address' => $ipAddress,
                'status'     => 'Gagal'
            ]);

            RateLimiter::hit($attemptKey, 600);
            $sisaPercobaan = RateLimiter::retriesLeft($attemptKey, 3); // Batas Admin = 3 kali

            if ($sisaPercobaan <= 0) {
                RateLimiter::clear($attemptKey);
                RateLimiter::hit($lockoutKey, 60);

                $pesanError = "Anda telah salah memasukkan password 3 kali. Silakan tunggu 60 detik untuk mencoba lagi.";
            } else {
                $pesanError = "Email atau password admin salah. Sisa percobaan: {$sisaPercobaan} kali lagi.";
            }

            return back()
                ->with('error', $pesanError)
                ->withInput($request->only('email'));

        } catch (\Exception $e) {
            Log::error('Sistem Login Gagal: ' . $e->getMessage());

            return back()
                ->with('error', 'Terjadi kesalahan sistem saat memproses login Anda. Silakan coba lagi.')
                ->withInput($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Anda telah berhasil keluar (logout).');
    }
}
