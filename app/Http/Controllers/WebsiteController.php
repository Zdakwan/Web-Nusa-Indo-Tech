<?php

namespace App\Http\Controllers;

class WebsiteController extends Controller
{
    public function beranda()
    {
        return view('pages.beranda');
    }

    public function layanan()
    {
        return view('pages.layanan');
    }

    public function portofolio()
    {
        return view('pages.portofolio');
    }

    public function pelatihan()
    {
        return view('pages.pelatihan');
    }

    public function ensiklopedia()
    {
        return view('pages.ensiklopedia');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }
}