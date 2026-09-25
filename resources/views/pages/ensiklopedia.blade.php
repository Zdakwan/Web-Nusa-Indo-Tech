@extends('layouts.app')

@section('title', 'Ensiklopedia - Nusa Indo Technology')

@section('content')

    <!-- Bagian Header Pencarian (Kuning) -->
    <section class="encyclopedia-header yellow-bg">
        <div class="encyclopedia-header-content">
            <h1>ENSIKLOPEDIA TEKNOLOGI INFORMASI</h1>
            <p>Temukan Berbagai Informasi Dan Pengetahuan Seputar Dunia Teknologi Informasi</p>
            
            <div class="search-container center-search">
                <form action="">
                    <input type="text" placeholder="Cari judul atau kata kunci" class="search-input">
                    <button type="submit" class="search-btn">🔍</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Bagian Konten Utama (Biru Gelap) -->
    <section class="encyclopedia-body dark-bg">
        
        <!-- Tag Populer -->
        <div class="tags-section">
            <h3 class="section-title-left">Tag Populer</h3>
            <div class="tags-cloud">
                <!-- Anda bisa melooping ini nanti dengan data dari database Laravel -->
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
                <span class="tag-pill">#pemula</span>
            </div>
        </div>

        <!-- Materi Populer -->
        <div class="materi-section">
            <h3 class="section-title-left">Materi Populer</h3>
            
            <!-- Kita menggunakan ulang grid dari portofolio karena desain kartunya identik -->
            <div class="portfolio-grid">
                
                <!-- Card 1 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Gambar Ilustrasi IT]</div>
                    <div class="portfolio-card-content">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                        <div class="portfolio-card-footer">
                            <div class="card-tags">
                                <span class="mini-tag">#IT</span>
                                <span class="mini-tag">#Pemula</span>
                            </div>
                            <a href="#" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Gambar Ilustrasi IT]</div>
                    <div class="portfolio-card-content">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                        <div class="portfolio-card-footer">
                            <div class="card-tags">
                                <span class="mini-tag">#IT</span>
                                <span class="mini-tag">#Pemula</span>
                            </div>
                            <a href="#" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Gambar Ilustrasi IT]</div>
                    <div class="portfolio-card-content">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                        <div class="portfolio-card-footer">
                            <div class="card-tags">
                                <span class="mini-tag">#IT</span>
                                <span class="mini-tag">#Pemula</span>
                            </div>
                            <a href="#" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
                
                <!-- Card 4 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Gambar Ilustrasi IT]</div>
                    <div class="portfolio-card-content">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                        <div class="portfolio-card-footer">
                            <div class="card-tags">
                                <span class="mini-tag">#IT</span>
                                <span class="mini-tag">#Pemula</span>
                            </div>
                            <a href="#" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Gambar Ilustrasi IT]</div>
                    <div class="portfolio-card-content">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                        <div class="portfolio-card-footer">
                            <div class="card-tags">
                                <span class="mini-tag">#IT</span>
                                <span class="mini-tag">#Pemula</span>
                            </div>
                            <a href="#" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Gambar Ilustrasi IT]</div>
                    <div class="portfolio-card-content">
                        <h3>Mengenal IT Untuk Pemula</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                        <div class="portfolio-card-footer">
                            <div class="card-tags">
                                <span class="mini-tag">#IT</span>
                                <span class="mini-tag">#Pemula</span>
                            </div>
                            <a href="#" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- Panggil Komponen CTA -->
    @include('components.cta')

@endsection