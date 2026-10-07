<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Nusa Indo Tech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-[#eef2f7] text-gray-900">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            @include('admin.partials.topbar')

            <main class="p-5 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        if (window.innerWidth < 1024) sidebar.classList.add('-ml-64');

        function toggleSidebar() {
            sidebar.classList.toggle('-ml-64');
        }

        function toggleMenu(id) {
            document.getElementById(id).classList.toggle('hidden');
            document.getElementById(id + '-chevron').classList.toggle('rotate-180');
        }
    </script>
    @stack('scripts')
</body>
</html>
