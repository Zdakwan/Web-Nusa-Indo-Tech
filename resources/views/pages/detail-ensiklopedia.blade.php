@extends('layouts.app') <!-- Sesuaikan dengan nama layout utama Anda -->

@section('content')
<main class="ensiklopedia-detail-wrapper">
    <div class="container-detail">
        
        <!-- Bagian Hero -->
        <section class="hero-detail">
            <div class="hero-text">
                <a href="/ensiklopedia" class="back-link">&larr; Detail Ensiklopedia</a>
                <h1>Mengenal IT Untuk <span class="text-yellow">Pemula</span></h1>
                <p>Pelajari dasar-dasar teknologi informasi, mulai dari pengertian komponen utama, hingga peran pentingnya dalam kehidupan sehari-hari.</p>
                <div class="tag-group">
                    <span class="tag">#pemula</span>
                    <span class="tag">#teknologi</span>
                    <span class="tag">#digitalisasi</span>
                </div>
            </div>
            <div class="hero-image">
                <!-- Ganti src dengan gambar ilustrasi Anda -->
                <img src="https://via.placeholder.com/500x300/1e40af/ffffff?text=Ilustrasi+IT" alt="Ilustrasi IT">
            </div>
        </section>

        <!-- Bagian Pengertian -->
        <section class="content-section">
            <h2>Pengertian IT</h2>
            <p>Teknologi Informasi (Information Technology / IT) adalah segala bentuk teknologi yang digunakan untuk mengelola, memproses, menyimpan, dan mendistribusikan informasi dalam bentuk digital. IT mencakup perangkat keras, perangkat lunak, jaringan, data serta manusia yang mengoperasikannya.</p>
        </section>

        <!-- Bagian Komponen -->
        <section class="content-section">
            <h2>Komponen Utama IT</h2>
            <p class="subtitle">Secara umum, teknologi informasi terdiri dari beberapa komponen utama.</p>
            
            <div class="grid-komponen">
                <!-- Card Komponen 1 -->
                <div class="card-komponen">
                    <div class="icon-komponen">🖥️</div>
                    <h3>Perangkat Keras<br>(Hardware)</h3>
                    <p>Komponen fisik seperti komputer, server, jaringan, dan perangkat lainnya.</p>
                </div>
                <!-- Card Komponen 2 -->
                <div class="card-komponen">
                    <div class="icon-komponen">💻</div>
                    <h3>Perangkat Lunak<br>(Software)</h3>
                    <p>Program atau aplikasi yang memberikan instruksi pada perangkat keras.</p>
                </div>
                <!-- Card Komponen 3 -->
                <div class="card-komponen">
                    <div class="icon-komponen">🌐</div>
                    <h3>Jaringan<br>(Network)</h3>
                    <p>Sistem yang menghubungkan perangkat keras untuk berbagi data.</p>
                </div>
                <!-- Card Komponen 4 -->
                <div class="card-komponen">
                    <div class="icon-komponen">📊</div>
                    <h3>Data dan Basis Data<br>(Database)</h3>
                    <p>Fakta, angka, dan teks yang diproses menjadi informasi berguna.</p>
                </div>
            </div>
        </section>

        <!-- Bagian Manfaat -->
        <section class="content-section">
            <h2>Manfaat Utama IT</h2>
            <p class="subtitle">Teknologi informasi memberikan banyak manfaat di antaranya:</p>
            <div class="banner-manfaat">
                <ul class="list-manfaat">
                    <li>Memudahkan akses informasi kapan saja dan di mana saja.</li>
                    <li>Meningkatkan efisiensi dan produktivitas kerja.</li>
                    <li>Mendukung komunikasi yang lebih cepat dan efektif.</li>
                    <li>Membuka peluang inovasi dan bisnis baru.</li>
                </ul>
            </div>
        </section>

        <!-- Bagian Kesimpulan -->
        <section class="content-section">
            <h2>Kesimpulan</h2>
            <p>IT sudah menjadi bagian penting dalam kehidupan Modern. Dengan memahami dasar-dasarnya, Anda dapat lebih siap menghadapi perkembangan teknologi dan memanfaatkannya untuk mendukung pendidikan, pekerjaan, maupun bisnis di masa depan.</p>
        </section>

        <!-- Bagian Artikel Terkait -->
        <section class="content-section">
            <h2>Cek Artikel Lainnya</h2>
            <div class="grid-artikel">
                <!-- Card Artikel 1 -->
                <div class="card-artikel">
                    <img src="https://via.placeholder.com/400x200/1e40af/ffffff?text=Gambar+Artikel" alt="Artikel">
                    <div class="card-artikel-body">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="artikel-footer">
                            <span class="tag-dark">#IT</span>
                            <a href="#" class="btn-selengkapnya">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
                <!-- Card Artikel 2 -->
                <div class="card-artikel">
                    <img src="https://via.placeholder.com/400x200/1e40af/ffffff?text=Gambar+Artikel" alt="Artikel">
                    <div class="card-artikel-body">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="artikel-footer">
                            <span class="tag-dark">#IT</span>
                            <a href="#" class="btn-selengkapnya">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
                <!-- Card Artikel 3 -->
                <div class="card-artikel">
                    <img src="https://via.placeholder.com/400x200/1e40af/ffffff?text=Gambar+Artikel" alt="Artikel">
                    <div class="card-artikel-body">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="artikel-footer">
                            <span class="tag-dark">#IT</span>
                            <a href="#" class="btn-selengkapnya">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Banner Call to Action -->
    <section class="cta-banner-bottom">
        <div class="cta-container">
            <h2>Punya Proyek IT yang Menantang?<br>Mari Konsultasikan Gratis</h2>
            <a href="/konsultasi" class="btn-cta-dark">Mulai Konsultasi</a>
        </div>
    </section>
</main>
@endsection