<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nusa Indo Technology</title>
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
            
           <form action="{{ url('/login') }}" method="POST" class="auth-form">
    @csrf 
    
    <!-- Blok Pesan Error Login -->
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="input-group">
        <span class="input-icon">👤</span>
        <!-- Pastikan ada name="email" -->
        <input type="email" name="email" placeholder="Email / Username" required>
    </div>
    
    <div class="input-group">
        <span class="input-icon">🔒</span>
        <!-- Pastikan ada name="password" -->
        <input type="password" name="password" placeholder="Password" required>
        <span class="input-icon-right">👁️</span>
    </div>
    
    <button type="submit" class="auth-btn">Masuk</button>
</form>