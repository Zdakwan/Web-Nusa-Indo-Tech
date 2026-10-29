<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Tambahkan 4 baris "use" di bawah ini agar class terdeteksi
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Request;
use App\Models\LoginLog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // PEREKAM OTOMATIS RIWAYAT LOGIN
        Event::listen(function (Login $event) {
            $user = $event->user;
            
            // Cek apakah ini admin (super_admin/admin_layanan) atau client
            $role = $event->guard === 'admin' ? ($user->role ?? 'Admin') : 'Client';

            LoginLog::create([
                'nama'       => $user->name ?? $user->company ?? 'Pengguna',
                'email'      => $user->email,
                'role'       => $role,
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
            ]);
        });
    }
}