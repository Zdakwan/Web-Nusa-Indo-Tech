<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        $ipAddress = $request->ip();

        // Cek keberadaan admin untuk mendapatkan role (default jika tidak ada: Tidak Diketahui)
        $admin = Admin::where('email', $email)->first();
        $role = $admin ? $admin->role : 'Tidak Diketahui';

        try {
            // 2. Eksekusi Autentikasi
            if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {

                // Catat log sukses
                LoginLog::create([
                    'email'      => $email,
                    'role'       => $role,
                    'ip_address' => $ipAddress,
                    'status'     => 'Berhasil'
                ]);

                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }

            // Catat log gagal
            LoginLog::create([
                'email'      => $email,
                'role'       => $role,
                'ip_address' => $ipAddress,
                'status'     => 'Gagal'
            ]);

            return back()
                ->with('error', 'Email atau password admin yang Anda masukkan salah.')
                ->withInput($request->only('email'));

        } catch (\Exception $e) {
            // 3. Error handling jika koneksi database/sistem gagal
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

        return redirect()->route('admin.login');
    }
}
