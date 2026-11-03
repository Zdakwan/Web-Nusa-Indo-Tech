<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user();
        return view('profile.index', compact('client'));
    }

    public function edit()
    {
        $client = Auth::guard('client')->user();
        return view('profile.edit', compact('client'));
    }

    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:clients,email,' . $client->id],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'company' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif,bmp', 'min:2048', 'max:8192'],
        ], [
            'avatar.min' => 'Gagal: Ukuran avatar terlalu kecil. Minimal harus 2 MB.',
            'avatar.max' => 'Gagal: Ukuran avatar terlalu besar. Maksimal 8 MB.',
            'avatar.mimes' => 'Format avatar harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'avatar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        $oldAvatar = $client->avatar;
        $newAvatar = null;

        if ($request->hasFile('avatar')) {
            $newAvatar = $request->file('avatar')->store('avatars', 'public');
            if (!$newAvatar) {
                return back()->withInput()->withErrors(['avatar' => 'Foto gagal disimpan. Silakan coba kembali.']);
            }
            $validated['avatar'] = $newAvatar;
        }

        $client->update($validated);

        if ($newAvatar && $oldAvatar && $oldAvatar !== $newAvatar && Storage::disk('public')->exists($oldAvatar)) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function deleteAvatar()
    {
        $client = Auth::guard('client')->user();
        $oldAvatar = $client->avatar;

        $client->update(['avatar' => null]);

        if ($oldAvatar && Storage::disk('public')->exists($oldAvatar)) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()->route('profile.edit')->with('success', 'Foto profil berhasil dihapus!');
    }
}
