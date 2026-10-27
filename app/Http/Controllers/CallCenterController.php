<?php

namespace App\Http\Controllers;

use App\Models\CallCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CallCenterController extends Controller
{
    public function index()
    {
        return view('pengaturan.call-center.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subjek' => ['required', 'string', 'max:255'],
            'pesan' => ['required', 'string', 'max:10000'],
            'file' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf,doc,docx',
                'max:5120',
            ],
        ]);

        $client = Auth::guard('client')->user();

        $data = [
            'client_id' => $client?->id,
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'subjek' => $validated['subjek'],
            'pesan' => $validated['pesan'],
            'status' => 'menunggu',
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('call-center', 'public');

            $data['file_path'] = $path;
            $data['file_name'] = $file->getClientOriginalName();
        }

        CallCenter::create($data);

        return redirect()
            ->back()
            ->with('success', 'Laporan berhasil dikirim. Tim kami akan menindaklanjutinya.');
    }
}