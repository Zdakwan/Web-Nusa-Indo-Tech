<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Memproses Form Pendaftaran
    public function registerProcess(Request $request)
    {
        // === RADAR DEBUGGING: Hentikan sistem dan tampilkan data form ===
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients', 
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ]);

       try {
            // 1. Simpan ke database menggunakan Model Client
            $client = Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // Hapus atau berikan komentar pada baris Auth::login ini
            // Auth::guard('client')->login($client);

            // 2. Arahkan langsung ke halaman Login dengan membawa pesan sukses
            return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan masuk menggunakan akun baru Anda.');

        } catch (\Exception $e) {

    
            // Tangkap pesan error dari database jika gagal
            return back()->with('error', 'Gagal menyimpan ke database! Error: ' . $e->getMessage());
        }
    }

    // 2. Memproses Form Login
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-admin');
        }

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-client');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // 3. Memproses Logout
    public function logout(Request $request)
    {
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