@extends('layouts.app')

@section('title', 'Beranda - Nusa Indo Technology')

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container hero-grid">
            <div>
                <h1 class="hero-title">
                    Solusi IT Terintegrasi<br>
                    Untuk Masa Depan<br>
                    Bisnis Anda
                </h1>
                <p class="hero-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
              <a href="{{ route('login') }}" class="btn-primary">Mulai Transformasi Digital</a>
            </div>

            <div class="hero-illustration">
                <div class="art-card">
                    <div class="lightbulb-wrapper">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                </div>
                <div class="gear-cyan"><i class="fa-solid fa-gear"></i></div>
                <div class="gear-indigo"><i class="fa-solid fa-gear"></i></div>
            </div>
        </div>
    </section>

    <!-- LAYANAN UNGGULAN -->
    <section id="layanan" class="services-section">
        <div class="container">
            <h2 class="section-title">Layanan Unggulan Kami</h2>

            <div class="grid-3">
                <div class="service-card">
                    <div class="icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3 class="card-heading">IT Governance & Training IT</h3>
                    <p class="card-desc">Layanan audit, tata kelola (IT), serta pelatihan teknologi informasi untuk organisasi maupun individu.</p>
                </div>

                <div class="service-card">
                    <div class="icon-box"><i class="fa-solid fa-building-columns"></i></div>
                    <h3 class="card-heading">Enterprise Architecture</h3>
                    <p class="card-desc">Perancangan IT Blueprint dan arsitektur sistem untuk menyelaraskan teknologi dengan strategi bisnis.</p>
                </div>

                <div class="service-card">
                    <div class="icon-box"><i class="fa-solid fa-folder-open"></i></div>
                    <h3 class="card-heading">IT Portfolio Management</h3>
                    <p class="card-desc">Perencanaan strategis jangka panjang untuk mengelola dan mengoptimalkan investasi sistem informasi.</p>
                </div>

                <div class="service-card">
                    <div class="icon-box"><i class="fa-solid fa-microchip"></i></div>
                    <h3 class="card-heading">Hardware Development</h3>
                    <p class="card-desc">Layanan perancangan dan pengembangan perangkat keras (hardware) sesuai kebutuhan bisnis anda.</p>
                </div>

                <div class="service-card">
                    <div class="icon-box"><i class="fa-solid fa-code"></i></div>
                    <h3 class="card-heading">Software Development</h3>
                    <p class="card-desc">Layanan pembuatan dan pengembangan aplikasi/perangkat lunak (software) untuk menunjang operasional perusahaan.</p>
                </div>

                <div class="service-card">
                    <div class="icon-box"><i class="fa-solid fa-circle-play"></i></div>
                    <h3 class="card-heading">Multimedia</h3>
                    <p class="card-desc">Pembuatan company profile, editing video, animasi, dan fotografi profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- MENGAPA MEMILIH KAMI -->
    <section class="why-us-section">
        <div class="container">
            <h2 class="section-title">Mengapa Memilih Kami?</h2>

            <div class="grid-4">
                <div class="feature-card">
                    <div class="icon-box-sm"><i class="fa-solid fa-users"></i></div>
                    <h3 class="feature-heading">Memberi Arahan</h3>
                    <p class="feature-desc">Kami membantu mengarahkan strategi teknologi bisnis kamu agar lebih terstruktur, efisien, dan siap menghadapi tantangan digital.</p>
                </div>

                <div class="feature-card">
                    <div class="icon-box-sm"><i class="fa-solid fa-clipboard-check"></i></div>
                    <h3 class="feature-heading">Perencanaan Baik</h3>
                    <p class="feature-desc">Setiap solusi dirancang dengan roadmap dan arsitektur sistem yang matang untuk memastikan eksekusi proyek tepat waktu dan sesuai target.</p>
                </div>

                <div class="feature-card">
                    <div class="icon-box-sm"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h3 class="feature-heading">Meminimalisir Resiko</h3>
                    <p class="feature-desc">Kami mengidentifikasi potensi celah keamanan dan kendala teknis sejak awal untuk mencegah kerugian finansial maupun downtime sistem.</p>
                </div>

                <div class="feature-card">
                    <div class="icon-box-sm"><i class="fa-solid fa-bullseye"></i></div>
                    <h3 class="feature-heading">Bidang Spesifik</h3>
                    <p class="feature-desc">Dikerjakan oleh tim ahli yang berpengalaman di bidangnya masing-masing untuk menghadirkan solusi teknis yang presisi dan relevan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection