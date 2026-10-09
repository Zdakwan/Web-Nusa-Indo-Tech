<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Admin') - Nusa Indo Tech</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ filemtime(public_path('css/admin.css')) }}">

    @stack('styles')
</head>
<body class="flex h-screen overflow-hidden text-gray-900">

    @include('admin.partials.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden min-w-0">
        @include('admin.partials.topbar')

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-5 lg:p-8">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/admin.js') }}?v={{ filemtime(public_path('js/admin.js')) }}"></script>
    @stack('scripts')
</body>
</html>
