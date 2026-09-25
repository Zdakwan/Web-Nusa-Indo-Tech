@extends('layouts.app')

@section('title', 'Beranda - Nusa Indo Technology')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
       <!-- Bagian Hero Section di dalam beranda.blade.php -->
    <div class="hero-content">
    <h1>SOLUSI IT TERINTEGRASI UNTUK MASA DEPAN BISNIS ANDA</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    
    <!-- Ubah href="#" menjadi href="{{ url('/login') }}" di baris bawah ini -->
    <a href="{{ url('/login') }}" class="btn-primary">Mulai Transformasi Digital</a>
</div>
        <div class="hero-image">
            <div class="image-placeholder">[Ilustrasi 3D]</div>
        </div>
    </section>

    <!-- Layanan Unggulan Section -->
    <section class="services-section">
        <h2>Layanan Unggulan Kami</h2>
        <div class="grid-container grid-3">
            <div class="card">
                <div class="icon">🛡️</div>
                <h3>IT Governance & Training IT</h3>
                <p>Layanan audit, tata kelola IT, serta pelatihan teknologi informasi untuk organisasi maupun individu.</p>
                <a href="#" class="btn-secondary">Selengkapnya</a>
            </div>
            <div class="card">
                <div class="icon">🏢</div>
                <h3>Enterprise Architecture</h3>
                <p>Perancangan IT Blueprint dan arsitektur sistem untuk menyelaraskan teknologi dengan strategi bisnis.</p>
                <a href="#" class="btn-secondary">Selengkapnya</a>
            </div>
            <div class="card">
                <div class="icon">📂</div>
                <h3>IT Portfolio Management</h3>
                <p>Perencanaan strategis jangka panjang untuk mengelola dan mengoptimalkan investasi sistem informasi.</p>
                <a href="#" class="btn-secondary">Selengkapnya</a>
            </div>
            <div class="card">
                <div class="icon">🖥️</div>
                <h3>Hardware Development</h3>
                <p>Layanan perancangan dan pengembangan perangkat keras (hardware) sesuai kebutuhan bisnis Anda.</p>
                <a href="#" class="btn-secondary">Selengkapnya</a>
            </div>
            <div class="card">
                <div class="icon">💻</div>
                <h3>Software Development</h3>
                <p>Layanan pembuatan dan pengembangan aplikasi/perangkat lunak (software) untuk menunjang operasional perusahaan.</p>
                <a href="#" class="btn-secondary">Selengkapnya</a>
            </div>
            <div class="card">
                <div class="icon">▶️</div>
                <h3>Multimedia</h3>
                <p>Pembuatan company profile, editing video, animasi, dan fotografi profesional.</p>
                <a href="#" class="btn-secondary">Selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- Mengapa Memilih Kami Section -->
    <section class="reasons-section">
        <h2>Mengapa Memilih Kami?</h2>
        <div class="grid-container grid-4">
            <div class="card">
                <div class="icon">👥</div>
                <h3>Memberi Arahan</h3>
                <p>Kami membantu mengarahkan strategi teknologi bisnis Anda agar lebih terstruktur, efisien, dan siap menghadapi tantangan digital.</p>
            </div>
            <div class="card">
                <div class="icon">📋</div>
                <h3>Perencanaan Baik</h3>
                <p>Setiap solusi dirancang dengan roadmap dan arsitektur sistem yang matang untuk memastikan eksekusi proyek tepat waktu dan sesuai target.</p>
            </div>
            <div class="card">
                <div class="icon">⚠️</div>
                <h3>Meminimalisir Resiko</h3>
                <p>Kami mengidentifikasi potensi celah keamanan dan kendala teknis sejak awal untuk mencegah kerugian finansial maupun operasional.</p>
            </div>
            <div class="card">
                <div class="icon">🎯</div>
                <h3>Bidang Spesifik</h3>
                <p>Dikerjakan oleh tim ahli yang berpengalaman di bidangnya masing-masing untuk menghadirkan solusi teknis yang presisi dan relevan.</p>
            </div>
        </div>
    </section>

    @include('components.cta')
@endsection