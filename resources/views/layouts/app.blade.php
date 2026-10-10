<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NusaTechIndo')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>

    <!-- PANGGIL NAVBAR -->
    @include('partials.navbar')

    <!-- PANGGIL ALERT (Akan muncul jika ada pesan sukses/error) -->
    <div class="container" style="margin-top: 20px;">
        @include('partials.alert')
    </div>

    <!-- KONTEN UTAMA -->
    <main>
        @yield('content')
    </main>

    <!-- SECTION KONSULTASI (Banner Kuning) -->
    <section id="konsultasi" class="cta-section" style="background-color: #f5b73e; padding: 40px 0;">
        <div class="container cta-container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <div>
                <h3 class="cta-title" style="color: #23364f; font-size: 1.8rem; font-weight: 700; margin-bottom: 5px;">Punya Proyek IT yang Menantang?</h3>
                <p class="cta-subtitle" style="color: #23364f; font-size: 1.1rem; font-weight: 500;">Mari Konsultasikan Gratis</p>
            </div>
            <div>
                <a href="{{ route('register') }}" class="btn-login" style="background-color: #f59e0b; color: #0f172a; margin-right: 10px; padding: 10px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">Daftar</a>
                <a href="{{ route('login') }}" class="btn-login" style="background-color: #23364f; color: #ffffff; padding: 10px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">Login</a>
            </div>
        </div>
    </section>

    <!-- PANGGIL FOOTER -->
    @include('partials.footer')

</body>
</html>