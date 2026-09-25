<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Nusa Indo Technology</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-card">
            
            <!-- Logo NIT -->
            <div class="auth-logo">
                <div class="nit-circle">
                    <span>NIT</span>
                </div>
            </div>
            
            <!-- Judul -->
            <div class="auth-title">
                <h2>NUSAINDO TECHNOLOGY</h2>
                <p>IT MANAGEMENT CONSULTANT</p>
            </div>
            
            <!-- Form Register -->
            <form action="" method="POST" class="auth-form">
                @csrf
                <div class="input-group">
                    <span class="input-icon">👤</span>
                    <input type="text" placeholder="Username" required>
                </div>
                
                <div class="input-group">
                    <span class="input-icon">🔒</span>
                    <input type="password" placeholder="Password" required>
                    <span class="input-icon-right">👁️</span>
                </div>
                
                <div class="input-group">
                    <span class="input-icon">📞</span>
                    <input type="text" placeholder="No Telepon" required>
                </div>
                
                <div class="input-group">
                    <span class="input-icon">✉️</span>
                    <input type="email" placeholder="Email" required>
                </div>
                
                <button type="submit" class="auth-btn">Daftar</button>

            </form>
            
            <!-- Tombol kembali ke Beranda (Opsional agar pengguna bisa pulang) -->
            <div style="margin-top: 20px;">
                <a href="{{ url('/') }}" style="color: #555; text-decoration: none; font-size: 0.85rem;">&larr; Kembali ke Beranda</a>
            </div>

        </div>
    </div>

</body>
</html>