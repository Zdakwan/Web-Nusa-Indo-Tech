<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class PengaturanController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.pengaturan.index', compact('admin'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
    ], [
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password.min'       => 'Password baru minimal harus 8 karakter.',
            'email.required'     => 'Alamat email wajib diisi.',
            'name.required'      => 'Nama lengkap wajib diisi.',
    ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        // Jika password diisi, maka update password
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.pengaturan.index')->with('success', 'Pengaturan profil berhasil diperbarui.');
    }
}
