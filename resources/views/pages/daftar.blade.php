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
           <form action="{{ url('/daftar') }}" method="POST" class="auth-form">
    @csrf 
    
    <div class="input-group">
        <span class="input-icon">👤</span>
        <!-- Pastikan ada name="name" -->
        <input type="text" name="name" placeholder="Username" required>
    </div>
    
    <div class="input-group">
        <span class="input-icon">🔒</span>
        <!-- Pastikan ada name="password" -->
        <input type="password" name="password" placeholder="Password" required>
        <span class="input-icon-right">👁️</span>
    </div>
    
    <div class="input-group">
        <span class="input-icon">📞</span>
        <!-- Pastikan ada name="phone" -->
        <input type="text" name="phone" placeholder="No Telepon" required>
    </div>
    
    <div class="input-group">
        <span class="input-icon">✉️</span>
        <!-- Pastikan ada name="email" -->
        <input type="email" name="email" placeholder="Email" required>
    </div>
    
    <button type="submit" class="auth-btn">Daftar</button>
</form>