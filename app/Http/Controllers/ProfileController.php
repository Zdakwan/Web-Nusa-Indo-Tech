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
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $data = collect($validated)->except('avatar')->all();

        if ($request->hasFile('avatar')) {
            if ($client->avatar && Storage::disk('public')->exists($client->avatar)) {
                Storage::disk('public')->delete($client->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $client->update($data);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
