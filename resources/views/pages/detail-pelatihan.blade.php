@extends('layouts.app') <!-- Sesuaikan dengan layout utama Anda -->

@section('content')
<main class="pelatihan-detail-wrapper">
    <div class="container-detail">
        
        <!-- Bagian Hero Pelatihan -->
        <section class="hero-pelatihan">
            <div class="hero-text">
                <a href="/pelatihan" class="back-link">&larr; Kembali ke Daftar Pelatihan</a>
                <h1>Mastering Web Development dengan <span class="text-yellow">Laravel 12</span></h1>
                <p>Pelajari cara membangun aplikasi web modern yang dinamis dan aman menggunakan framework PHP paling populer saat ini, langsung dari praktisi industri.</p>
                <div class="pelatihan-meta">
                    <span class="meta-item">⏱️ 4 Minggu</span>
                    <span class="meta-item">👨‍💻 Tingkat: Menengah</span>
                    <span class="meta-item">🏅 Sertifikat Tersedia</span>
                </div>
            </div>
            <!-- Kartu Harga & Daftar (Sebelah Kanan) -->
            <div class="pricing-card">
                <img src="https://via.placeholder.com/400x250/1e40af/ffffff?text=Ilustrasi+Laravel" alt="Ilustrasi Kelas" class="img-pelatihan">
                <div class="pricing-body">
                    <h2 class="harga">Rp 499.000</h2>
                    <p class="harga-coret">Rp 999.000</p>
                    <a href="#" class="btn-daftar-pelatihan">Daftar Sekarang</a>
                    <ul class="benefit-list">
                        <li>✔️ Akses Materi Selamanya</li>
                        <li>✔️ Grup Diskusi Telegram</li>
                        <li>✔️ Review Kode Langsung</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Bagian Deskripsi & Kurikulum -->
        <div class="pelatihan-content-grid">
            <div class="main-content">
                <section class="content-section">
                    <h2>Deskripsi Kelas</h2>
                    <p>Kelas ini dirancang khusus untuk Anda yang sudah menguasai dasar PHP dan ingin melangkah ke level profesional. Anda akan belajar merancang struktur database, membuat sistem autentikasi multi-user, hingga melakukan deployment aplikasi ke server.</p>
                </section>

                <section class="content-section">
                    <h2>Kurikulum / Silabus</h2>
                    <div class="kurikulum-accordion">
                        <div class="kurikulum-item">
                            <h3>Materi 1: Pengenalan & Instalasi Laravel 12</h3>
                            <p>Setup environment, struktur folder, dan routing dasar.</p>
                        </div>
                        <div class="kurikulum-item">
                            <h3>Materi 2: Database & Eloquent ORM</h3>
                            <p>Migration, seeder, factory, dan relasi antar tabel database.</p>
                        </div>
                        <div class="kurikulum-item">
                            <h3>Materi 3: Sistem Autentikasi (Multi-Auth)</h3>
                            <p>Membangun fitur login dan register untuk peran Admin dan Client.</p>
                        </div>
                        <div class="kurikulum-item">
                            <h3>Materi 4: Final Project & Deployment</h3>
                            <p>Membangun proyek nyata dan mengunggahnya ke hosting publik.</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</main>
@endsection