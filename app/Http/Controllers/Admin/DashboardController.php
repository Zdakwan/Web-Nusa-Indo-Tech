<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total'    => Konsultasi::count(),
            'menunggu' => Konsultasi::where('status', 'pending')->count(),
            'diproses' => Konsultasi::where('status', 'approved')->count(),
            'selesai'  => Konsultasi::where('status', 'completed')->count(),
        ];

        $aktivitas = Konsultasi::with('client')
            ->latest()
            ->take(9)
            ->get();

        return view('admin.dashboard', compact('stats', 'aktivitas'));
    }
}
