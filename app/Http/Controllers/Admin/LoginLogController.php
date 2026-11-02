<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Http\Request;

class LoginLogController extends Controller
{
    public function index()
    {
        // Mengambil riwayat terbaru
        $logs = LoginLog::latest()->get();
        return view('admin.pengguna.riwayat-login', compact('logs'));
    }
}