<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Client - Nusa Indo Technology</title>
    <!-- Pastikan file CSS Anda terhubung di sini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="dashboard-layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <h2 class="logo-text"><span style="color: #f5b73e;">NIT</span> NUSAINDO TECHNOLOGY</h2>
            <p class="logo-sub">IT MANAGEMENT CONSULTANT</p>
        </div>
        <ul class="sidebar-menu">
            <li><a href="/dashboard-client" class="active"><span class="icon">🎛️</span> Dashboard</a></li>
            
            <li class="menu-group">Pusat Pengguna <span class="arrow">▼</span></li>
            <ul class="submenu">
                <li><a href="#"><span class="icon">👤</span> Data Diri</a></li>
                <li><a href="#"><span class="icon">✏️</span> Edit Data Diri</a></li>
            </ul>

            <li class="menu-group">Konsultasi</li>
            <li><a href="#"><span class="icon">📅</span> Booking</a></li>
            <li><a href="#"><span class="icon">📂</span> Konsultasi Saya</a></li>
            <li><a href="#"><span class="icon">🔔</span> Notifikasi</a></li>
            
            <li class="menu-divider"></li>
            <li><a href="#"><span class="icon">⚙️</span> Pengaturan</a></li>
            <li>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout"><span class="icon">🚪</span> Keluar</button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="main-wrapper">
        <!-- HEADER -->
        <header class="top-header">
            <div class="header-left">
                <button class="btn-menu">☰</button>
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Penelusuran">
                </div>
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('client')->user()->name ?? 'Klien') }}&background=f5b73e&color=fff" alt="Profile" class="avatar">
                    <div class="user-info">
                        <span class="user-name">{{ Auth::guard('client')->user()->name ?? 'Nama Klien' }}</span>
                        <span class="user-role">Klien</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- DASHBOARD CONTENT -->
        <main class="dashboard-content">
            <h1 class="page-title">Dashboard</h1>

            <!-- Statistik Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Permintaan Konsultasi</h3>
                    <div class="stat-value">3</div>
                    <div class="stat-wave wave-yellow"></div>
                </div>
                <div class="stat-card">
                    <div class="card-header-flex">
                        <h3>Jadwal Mendatang</h3>
                        <span class="icon-plus">📋</span>
                    </div>
                    <div class="stat-value">2</div>
                    <div class="stat-wave wave-green"></div>
                </div>
                <div class="stat-card">
                    <h3>Riwayat Konsultasi</h3>
                    <div class="stat-value">5</div>
                    <div class="stat-wave wave-blue"></div>
                </div>
            </div>

            <!-- Konten Tengah -->
            <div class="middle-grid">
                <!-- Jadwal Terdekat -->
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title"><span class="icon">📅</span> Jadwal Konsultasi Terdekat</h3>
                        <a href="#" class="link-semua">Lihat Semua</a>
                    </div>
                    <div class="card-body">
                        <div class="schedule-topic">
                            <div class="topic-icon">🖥️</div>
                            <h4>IT Training</h4>
                            <span class="badge badge-green">Terjadwal</span>
                        </div>
                        <p class="schedule-date">Senin, 27 September 2026</p>
                        <ul class="schedule-details">
                            <li><span class="icon">🕒</span> 09.00 - 12.00</li>
                            <li><span class="icon">👤</span> Konsultan : Mey Trisna</li>
                            <li><span class="icon">🎥</span> Online / Zoom</li>
                        </ul>
                        <div class="schedule-actions">
                            <a href="#" class="btn-outline">👁️ Lihat Detail</a>
                            <a href="#" class="btn-primary">🎥 Gabung Meeting</a>
                        </div>
                    </div>
                </div>

                <!-- Status Pendaftaran -->
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title"><span class="icon">📄</span> Status Pendaftaran Terbaru</h3>
                    </div>
                    <div class="card-body status-body">
                        <h4>Multimedia</h4>
                        <p class="status-date">Diajukan Pada 26 September 2026</p>
                        
                        <!-- Timeline -->
                        <div class="timeline">
                            <div class="timeline-line"></div>
                            <div class="timeline-step active">
                                <div class="step-circle">✔️</div>
                                <p>Pengajuan<br><span>26 Sep</span></p>
                            </div>
                            <div class="timeline-step active">
                                <div class="step-circle">✔️</div>
                                <p>Diverifikasi<br><span>27 Sep</span></p>
                            </div>
                            <div class="timeline-step current">
                                <div class="step-circle">🔵</div>
                                <p>Dijadwalkan<br><span>30 Sep</span></p>
                            </div>
                            <div class="timeline-step">
                                <div class="step-circle empty"></div>
                                <p>Selesai<br><span>&nbsp;</span></p>
                            </div>
                        </div>

                        <div class="status-footer">
                            <span class="badge badge-light-green">✔️ Disetujui Admin</span>
                            <a href="#" class="btn-outline">👁️ Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifikasi Bawah -->
            <div class="content-card mt-20">
                <div class="card-header border-bottom">
                    <h3 class="card-title"><span class="icon">🔔</span> Notifikasi Terbaru</h3>
                    <a href="#" class="link-semua">Lihat Semua</a>
                </div>
                <div class="notif-list">
                    <div class="notif-item">
                        <div class="notif-icon success">✔️</div>
                        <div class="notif-text">
                            <h4>Pendaftaran Disetujui</h4>
                            <p>Pendaftaran Konsultasi Anda Untuk Multimedia Telah Disetujui Oleh Admin</p>
                        </div>
                        <div class="notif-time">5 Menit Yang Lalu</div>
                    </div>
                    <div class="notif-item">
                        <div class="notif-icon info">📅</div>
                        <div class="notif-text">
                            <h4>Jadwal Konsultasi Dikonfirmasi</h4>
                            <p>Konsultasi Anda Dijadwalkan Pada 27 September 2026, 09.00 - 12.00.</p>
                        </div>
                        <div class="notif-time">10 Menit Yang Lalu</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>