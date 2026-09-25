@extends('layouts.app')

@section('title', 'Dashboard Klien - Nusa Indo Technology')

@section('content')
    <div style="padding: 100px 5%; text-align: center; min-height: 50vh;">
        <h1 style="color: var(--dark-blue);">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah halaman Dashboard Klien Anda.</p>
        
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 30px;">
            @csrf
            <button type="submit" class="btn-primary">Logout</button>
        </form>
    </div>
@endsection