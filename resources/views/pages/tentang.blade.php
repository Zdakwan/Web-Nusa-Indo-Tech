@extends('layouts.app')

@section('title', 'Tentang Kami - Nusa Indo Technology')

@section('content')

    <!-- Wrapper untuk seluruh halaman dengan background gelap -->
    <div class="dark-bg">

        <!-- Hero Section Tentang Kami -->
        <section class="about-hero">
            <div class="about-hero-text">
                <h1>Transformasi Digital<br>Bersama Nusa Indo Tech</h1>
                <p>Solusi teknologi inovatif untuk membantu bisnis anda berkembang di era digital</p>
            </div>
            <div class="about-hero-image">
                <!-- Ganti dengan tag <img src="..."> untuk foto asli -->
                <div class="image-placeholder-large">[Foto Rapat Tim]</div>
            </div>
        </section>

        <!-- Visi & Misi Section -->
        <section class="visi-misi-section">
            <h3 class="section-title-left">Visi & Misi</h3>
            <div class="visi-misi-grid">
                
                <!-- Card Visi -->
                <div class="visi-misi-card">
                    <h2>Visi</h2>
                    <p>Menjadi Konsultan terkemuka, terpercaya dalam bidang Teknologi informasi.</p>
                </div>

                <!-- Card Misi -->
                <div class="visi-misi-card">
                    <h2>Misi</h2>
                    <p>Memberikan layanan yang tepat, cepat dan sesuai dengan kebutuhan pelanggan. Memberikan kualitas layanan yang terbaik dengan menjaga profesionalisme, integritas dan komitmen profesi.</p>
                </div>

            </div>
        </section>

        <!-- Tim Kami Section -->
        <section class="team-section">
            <h3 class="section-title-left">Tim Kami</h3>
            
            <div class="team-grid">
                
                <!-- Anggota Tim 1 -->
                <div class="team-card">
                    <div class="team-img-placeholder">[Foto Alexander]</div>
                    <div class="team-info">
                        <h4>Alexander</h4>
                        <p>Project Manager</p>
                    </div>
                </div>

                <!-- Anggota Tim 2 -->
                <div class="team-card">
                    <div class="team-img-placeholder">[Foto Alexander]</div>
                    <div class="team-info">
                        <h4>Alexander</h4>
                        <p>Project Manager</p>
                    </div>
                </div>

                <!-- Anggota Tim 3 -->
                <div class="team-card">
                    <div class="team-img-placeholder">[Foto Alexander]</div>
                    <div class="team-info">
                        <h4>Alexander</h4>
                        <p>Project Manager</p>
                    </div>
                </div>

                <!-- Anggota Tim 4 -->
                <div class="team-card">
                    <div class="team-img-placeholder">[Foto Alexander]</div>
                    <div class="team-info">
                        <h4>Alexander</h4>
                        <p>Project Manager</p>
                    </div>
                </div>

                <!-- Anggota Tim 5 -->
                <div class="team-card">
                    <div class="team-img-placeholder">[Foto Alexander]</div>
                    <div class="team-info">
                        <h4>Alexander</h4>
                        <p>Project Manager</p>
                    </div>
                </div>

                <!-- Anggota Tim 6 -->
                <div class="team-card">
                    <div class="team-img-placeholder">[Foto Alexander]</div>
                    <div class="team-info">
                        <h4>Alexander</h4>
                        <p>Project Manager</p>
                    </div>
                </div>

            </div>
        </section>

    </div> <!-- End of dark-bg wrapper -->

    <!-- Panggil Komponen CTA -->
    @include('components.cta')

@endsection