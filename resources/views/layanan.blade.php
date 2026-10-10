@extends('layouts.app')

@section('title', 'Layanan Profesional Kami - Nusa Indo Technology')

@section('content')

    <!-- HERO HEADER: LAYANAN PROFESIONAL KAMI (KUNING) -->
    <section class="services-hero-header">
        <div class="container services-hero-grid">
            <div class="services-hero-text">
                <span class="sub-badge-title">LAYANAN PROFESIONAL KAMI</span>
                <h1 class="service-item-title">IT Portofolio Management</h1>
                <p class="service-lead-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                
                <div class="service-points-block">
                    <h4 class="points-label">Key Points:</h4>
                    <ul class="points-list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    </ul>
                </div>

                <div class="service-points-block mt-3">
                    <h4 class="points-label">Brief Case Example:</h4>
                    <p class="case-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </p>
                </div>
            </div>

            <!-- ILUSTRASI 3D: CHECKLIST / CLIPBOARD -->
            <div class="illustration-box flex-center">
                <div class="isometric-board board-white">
                    <div class="board-clip"></div>
                    <div class="checklist-items">
                        <div class="check-row">
                            <span class="check-box checked-blue"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                        <div class="check-row">
                            <span class="check-box checked-yellow"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                        <div class="check-row">
                            <span class="check-box checked-blue"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                        <div class="check-row">
                            <span class="check-box checked-yellow"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                    </div>
                    <!-- Stylized floating 3D hands / accents -->
                    <div class="floating-hand left-hand"></div>
                    <div class="floating-hand right-hand">
                        <div class="floating-pencil"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTAINER DAFTAR LAYANAN (BACKGROUND NAVY GELAP) -->
    <div class="services-dark-wrapper">
        <div class="container">

            <!-- 1. IT GOVERNANCE & TRAINING IT (Kiri: Ilustrasi Monitor + Gembok, Kanan: Teks) -->
            <section class="service-zigzag-row reverse-row">
                <div class="illustration-box flex-center">
                    <div class="monitor-3d">
                        <div class="monitor-screen">
                            <div class="mock-browser-bars">
                                <span></span><span></span><span></span>
                            </div>
                            <div class="monitor-inner-icons">
                                <i class="fa-solid fa-gear gear-amber spin-slow"></i>
                                <i class="fa-solid fa-gear gear-cyan spin-rev"></i>
                            </div>
                        </div>
                        <div class="monitor-stand"></div>
                        <div class="monitor-base"></div>
                        <!-- 3D Lock Overlay -->
                        <div class="lock-3d-badge">
                            <div class="shackle-3d"></div>
                            <i class="fa-solid fa-keyhole lock-key"></i>
                        </div>
                    </div>
                </div>

                <div class="service-zigzag-text text-light">
                    <h2 class="service-item-title text-white">IT Governance & Training IT</h2>
                    <p class="service-lead-desc text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <div class="service-points-block">
                        <h4 class="points-label text-white">Key Points:</h4>
                        <ul class="points-list text-muted">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ul>
                    </div>
                    <div class="service-points-block mt-3">
                        <h4 class="points-label text-white">Brief Case Example:</h4>
                        <p class="case-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. ENTERPRISE ARCHITECTURE (Kiri: Teks, Kanan: Ilustrasi Bubble Chat Code) -->
            <section class="service-zigzag-row">
                <div class="service-zigzag-text text-light">
                    <h2 class="service-item-title text-white">Enterprise Architecture</h2>
                    <p class="service-lead-desc text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <div class="service-points-block">
                        <h4 class="points-label text-white">Key Points:</h4>
                        <ul class="points-list text-muted">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ul>
                    </div>
                    <div class="service-points-block mt-3">
                        <h4 class="points-label text-white">Brief Case Example:</h4>
                        <p class="case-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                </div>

                <div class="illustration-box flex-center">
                    <div class="bubbles-3d-group">
                        <div class="bubble-3d bubble-purple">
                            <span class="code-symbol">{ ... }</span>
                        </div>
                        <div class="bubble-3d bubble-yellow">
                            <span class="code-symbol">&lt; / &gt;</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 3. HARDWARE DEVELOPMENT (Kiri: Ilustrasi PC & Wrench/Gear, Kanan: Teks) -->
            <section class="service-zigzag-row reverse-row">
                <div class="illustration-box flex-center">
                    <div class="hardware-3d-unit">
                        <!-- Casing PC Tower -->
                        <div class="pc-tower-3d">
                            <div class="tower-drive"></div>
                            <div class="tower-drive"></div>
                            <div class="tower-btn"></div>
                        </div>
                        <!-- Layar CPU & Chip -->
                        <div class="hardware-screen-3d">
                            <div class="chip-socket">
                                <i class="fa-solid fa-microchip"></i>
                            </div>
                        </div>
                        <!-- Kunci Pas / Tooling 3D -->
                        <div class="tool-wrench-3d">
                            <i class="fa-solid fa-wrench"></i>
                        </div>
                    </div>
                </div>

                <div class="service-zigzag-text text-light">
                    <h2 class="service-item-title text-white">Hardware Development</h2>
                    <p class="service-lead-desc text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <div class="service-points-block">
                        <h4 class="points-label text-white">Key Points:</h4>
                        <ul class="points-list text-muted">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ul>
                    </div>
                    <div class="service-points-block mt-3">
                        <h4 class="points-label text-white">Brief Case Example:</h4>
                        <p class="case-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                </div>
            </section>

            <!-- 4. SOFTWARE DEVELOPMENT (Kiri: Teks, Kanan: Ilustrasi App Window Code) -->
            <section class="service-zigzag-row">
                <div class="service-zigzag-text text-light">
                    <h2 class="service-item-title text-white">Software Development</h2>
                    <p class="service-lead-desc text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <div class="service-points-block">
                        <h4 class="points-label text-white">Key Points:</h4>
                        <ul class="points-list text-muted">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ul>
                    </div>
                    <div class="service-points-block mt-3">
                        <h4 class="points-label text-white">Brief Case Example:</h4>
                        <p class="case-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                </div>

                <div class="illustration-box flex-center">
                    <div class="ide-window-3d">
                        <div class="window-header">
                            <span class="w-dot dot-red"></span>
                            <span class="w-dot dot-yellow"></span>
                            <span class="w-dot dot-green"></span>
                        </div>
                        <div class="window-body">
                            <div class="code-line w-60"></div>
                            <div class="code-line w-80"></div>
                            <div class="code-line w-40"></div>
                        </div>
                        <!-- Floating Badge Code Yellow -->
                        <div class="floating-badge-code">
                            <i class="fa-solid fa-code"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. MULTI MEDIA (Kiri: Ilustrasi Video, Audio, Pencil, Kanan: Teks) -->
            <section class="service-zigzag-row reverse-row">
                <div class="illustration-box flex-center">
                    <div class="multimedia-3d-cluster">
                        <!-- Film Roll Blue -->
                        <div class="film-strip-3d">
                            <i class="fa-solid fa-film"></i>
                        </div>
                        <!-- Main Player Card -->
                        <div class="player-card-3d">
                            <div class="play-triangle-btn">
                                <i class="fa-solid fa-play"></i>
                            </div>
                        </div>
                        <!-- Mini Photo / Card -->
                        <div class="mini-photo-3d">
                            <i class="fa-solid fa-image"></i>
                        </div>
                        <!-- Music Note Yellow -->
                        <div class="music-note-3d">
                            <i class="fa-solid fa-music"></i>
                        </div>
                        <!-- Stylus Pencil 3D -->
                        <div class="stylus-pencil-3d">
                            <i class="fa-solid fa-pen-nib"></i>
                        </div>
                    </div>
                </div>

                <div class="service-zigzag-text text-light">
                    <h2 class="service-item-title text-white">Multi Media</h2>
                    <p class="service-lead-desc text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <div class="service-points-block">
                        <h4 class="points-label text-white">Key Points:</h4>
                        <ul class="points-list text-muted">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ul>
                    </div>
                    <div class="service-points-block mt-3">
                        <h4 class="points-label text-white">Brief Case Example:</h4>
                        <p class="case-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                </div>
            </section>

            <!-- CARDS BAWAH: PELATIHAN IT & ENSIKLOPEDIA IT -->
            <section class="bottom-features-grid">
                <!-- Card Pelatihan IT -->
                <div class="feature-box-yellow">
                    <h3 class="box-title">Pelatihan IT</h3>
                    <p class="box-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                    </p>
                    <a href="{{ url('/pelatihan') }}" class="btn-box-action">Buka Pelatihan</a>
                </div>

                <!-- Card Ensiklopedia IT -->
                <div class="feature-box-yellow">
                    <h3 class="box-title">Ensiklopedia IT</h3>
                    <p class="box-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                    </p>
                    <a href="{{ route('ensiklopedia.index') }}" class="btn-box-action">Buka Ensiklopedia</a>
                </div>
            </section>

        </div>
    </div>

@endsection