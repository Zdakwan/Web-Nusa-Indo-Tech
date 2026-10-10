@extends('layouts.app')

@section('title', 'Tentang Kami - Nusa Indo Technology')

@section('content')
    <!-- HERO TENTANG KAMI -->
    <section class="about-hero">
        <div class="container about-hero-grid">
            <div class="about-hero-text">
                <h1 class="about-title">
                    Transformasi Digital<br>
                    Bersama Nusa Indo Tech
                </h1>
                <p class="about-subtitle">
                    Solusi teknologi inovatif untuk membantu bisnis anda berkembang di era digital
                </p>
            </div>
            <div class="about-hero-img">
                <!-- Gambar Meeting / Kantor -->
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Meeting Nusa Indo Tech">
            </div>
        </div>
    </section>

    <!-- SECTION: VISI & MISI -->
    <section class="visi-misi-section">
        <div class="container">
            <h2 class="section-title text-left">Visi & Misi</h2>

            <div class="visi-misi-grid">
                <!-- Visi -->
                <div class="visi-card">
                    <h3 class="vm-heading">Visi</h3>
                    <p class="vm-text">
                        Menjadi Konsultan terkemuka, terpercaya dalam bidang Teknologi informasi.
                    </p>
                </div>

                <!-- Misi -->
                <div class="misi-card">
                    <h3 class="vm-heading">Misi</h3>
                    <p class="vm-text">
                        Memberikan layanan yang tepat, cepat dan sesuai dengan kebutuhan pelanggan. Memberikan kualitas layanan yang terbaik dengan menjaga profesionalisme, integritas dan komitmen profesi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TIM KAMI -->
    <section class="team-section">
        <div class="container">
            <h2 class="section-title text-left">Tim Kami</h2>

            <div class="team-grid">
                @php
                    $members = [
                        ['name' => 'Alexander', 'role' => 'Project Manager'],
                        ['name' => 'Alexander', 'role' => 'Project Manager'],
                        ['name' => 'Alexander', 'role' => 'Project Manager'],
                        ['name' => 'Alexander', 'role' => 'Project Manager'],
                        ['name' => 'Alexander', 'role' => 'Project Manager'],
                        ['name' => 'Alexander', 'role' => 'Project Manager'],
                    ];
                @endphp

                @foreach($members as $member)
                    <div class="team-card">
                        <div class="team-photo-wrapper">
                            <!-- Placeholder Foto Tim -->
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" alt="{{ $member['name'] }}" class="team-photo">
                        </div>
                        <div class="team-info">
                            <h4 class="member-name">{{ $member['name'] }}</h4>
                            <p class="member-role">{{ $member['role'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection