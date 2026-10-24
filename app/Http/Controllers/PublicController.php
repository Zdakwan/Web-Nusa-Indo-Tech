<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Portofolio;
use App\Models\Ensiklopedia;
use App\Models\Pelatihan;

class PublicController extends Controller
{
    public function home()
    {
        // Ambil beberapa layanan dan portofolio terbaru untuk ditampilkan di beranda
        $layanan = Layanan::latest()->take(3)->get();
        $portofolio = Portofolio::latest()->take(3)->get();
        return view('home', compact('layanan', 'portofolio'));
    }

    public function tentangKami()
    {
        return view('tentang-kami');
    }

    public function layanan(Request $request)
    {
        // Mengambil semua data layanan beserta jumlah portofolio dan rata-rata ratingnya
        $layanan = \App\Models\Layanan::withCount('portofolios')
            ->withAvg('portofolios', 'rating')
            ->get();

        return view('layanan', compact('layanan'));
    }

    public function portofolio()
    {
        $portofolio = Portofolio::latest()->get();
        return view('portofolio', compact('portofolio'));
    }

    public function detailPortofolio($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('detail-portofolio', compact('portofolio'));
    }

    public function ensiklopedia()
    {
        $ensiklopedia = Ensiklopedia::latest()->get();
        return view('ensiklopedia', compact('ensiklopedia'));
    }

    public function detailEnsiklopedia($id)
    {
        $ensiklopedia = Ensiklopedia::findOrFail($id);
        return view('detail-ensiklopedia', compact('ensiklopedia'));
    }

    public function pelatihan()
    {
        $pelatihan = Pelatihan::latest()->get();
        return view('pelatihan', compact('pelatihan'));
    }

    public function detailPelatihan($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return view('detail-pelatihan', compact('pelatihan'));
    }

    public function detailLayanan($id)
    {
        // Pastikan Anda sudah use App\Models\Layanan; di atas
        $layanan = \App\Models\Layanan::findOrFail($id);

        // Memanggil file detail-layanan.blade.php
        return view('detail-layanan', compact('layanan'));
    }
}
