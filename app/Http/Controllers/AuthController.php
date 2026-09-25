<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Memproses Form Pendaftaran (Masuk ke tabel clients)
    public function registerProcess(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients', 
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        try {
            // 2. Simpan ke database menggunakan Model Client
            $client = Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // 3. Login otomatis menggunakan guard 'client'
            Auth::guard('client')->login($client);

            // 4. Arahkan ke Dashboard Client dengan pesan sukses
            return redirect('/dashboard-client')->with('success', 'Berhasil! Data Anda telah tersimpan di tabel clients.');

        } catch (\Exception $e) {
            // Tangkap pesan error dari database jika gagal
            return back()->with('error', 'Gagal menyimpan ke database! Error: ' . $e->getMessage());
        }
    }

    // 2. Memproses Form Login (Sesuai gambar form yang Anda miliki)
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Skenario 1: Coba login sebagai Admin terlebih dahulu
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-admin');
        }

        // Skenario 2: Jika bukan admin, coba login sebagai Client
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-client');
        }

        // Jika email atau password tidak ada di kedua tabel
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // 3. Memproses Logout
    public function logout(Request $request)
    {
        // Cek guard mana yang sedang aktif, lalu logout
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}