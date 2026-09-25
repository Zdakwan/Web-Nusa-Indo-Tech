@extends('layouts.app')

@section('title', 'Layanan - Nusa Indo Technology')

@section('content')

    <!-- Section 1: IT Portofolio Management (Yellow) -->
    <section class="service-block yellow-bg">
        <div class="service-text">
            <h1 class="page-title">LAYANAN PROFESIONAL KAMI</h1>
            <h2>IT Portofolio Management</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            
            <h4>Key Points</h4>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            </ul>

            <h4>Brief Case Example</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="service-image">
            <div class="image-placeholder">[Ilustrasi 3D Checklist]</div>
        </div>
    </section>

    <!-- Section 2: IT Governance (Dark Blue, Reversed) -->
    <section class="service-block dark-bg reverse-layout">
        <div class="service-text">
            <h2>IT Governance</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            
            <h4>Key Points</h4>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            </ul>

            <h4>Brief Case Example</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="service-image">
            <div class="image-placeholder">[Ilustrasi 3D Gembok & Layar]</div>
        </div>
    </section>

    <!-- Section 3: Training IT (Dark Blue) -->
    <section class="service-block dark-bg">
        <div class="service-text">
            <h2>Training IT</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            
            <h4>Key Points</h4>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            </ul>

            <h4>Brief Case Example</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="service-image">
            <div class="image-placeholder">[Ilustrasi 3D Bubble Chat]</div>
        </div>
    </section>

    <!-- Section 4: Bottom Banner Cards -->
    <section class="bottom-banners dark-bg">
        <div class="banner-grid">
            <!-- Card Pelatihan -->
            <div class="banner-card">
                <div class="banner-content">
                    <h3>Pelatihan IT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#" class="btn-primary dark-btn">Buka Pelatihan</a>
                </div>
                <div class="banner-icon">🎓</div>
            </div>
            <!-- Card Ensiklopedia -->
            <div class="banner-card">
                <div class="banner-content">
                    <h3>Ensiklopedia IT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#" class="btn-primary dark-btn">Buka Ensiklopedia</a>
                </div>
                <div class="banner-icon">📘</div>
            </div>
        </div>
    </section>

    <!-- Panggil Komponen CTA -->
    @include('components.cta')

@endsection