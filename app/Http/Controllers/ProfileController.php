<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan halaman profil client
    public function index()
    {
        $client = Auth::guard('client')->user();

        return view('profile.index', compact('client'));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        $client = Auth::guard('client')->user();

        return view('profile.edit', compact('client'));
    }

    // Memvalidasi dan menyimpan perubahan profil
    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();

        // Validasi data profil dan foto
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:clients,email,' . $client->id,
            ],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'company' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'avatar' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
        ]);

        // Simpan path foto lama
        $oldAvatar = $client->avatar;
        $newAvatar = null;

        // Simpan foto baru jika ada unggahan
        if ($request->hasFile('avatar')) {
            $newAvatar = $request->file('avatar')
                ->store('avatars', 'public');

            if (!$newAvatar) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'avatar' => 'Foto gagal disimpan. Silakan coba kembali.',
                    ]);
            }

            $validated['avatar'] = $newAvatar;
        }

        // Perbarui data profil
        $client->update($validated);

        // Hapus foto lama setelah data profil berhasil diperbarui
        if (
            $newAvatar &&
            $oldAvatar &&
            $oldAvatar !== $newAvatar &&
            Storage::disk('public')->exists($oldAvatar)
        ) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    // Menghapus foto profil client
    public function deleteAvatar()
    {
        $client = Auth::guard('client')->user();

        // Simpan path foto lama
        $oldAvatar = $client->avatar;

        // Kosongkan foto profil di database
        $client->update([
            'avatar' => null,
        ]);

        // Hapus file foto dari penyimpanan
        if (
            $oldAvatar &&
            Storage::disk('public')->exists($oldAvatar)
        ) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Foto profil berhasil dihapus!');
    }
}