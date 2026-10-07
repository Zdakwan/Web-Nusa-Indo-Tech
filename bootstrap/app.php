<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin.role' => \App\Http\Middleware\AdminRole::class,
    ]);

    $middleware->redirectGuestsTo(fn (Request $request) =>
        $request->is('admin/*') ? route('admin.login') : route('login')
    );

    $middleware->redirectUsersTo(fn (Request $request) =>
        Auth::guard('admin')->check() ? route('admin.dashboard') : route('dashboard')
    );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
