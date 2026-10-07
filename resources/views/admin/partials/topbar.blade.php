@php
    $admin = auth('admin')->user();
    $pendingCount = \App\Models\Konsultasi::where('status', 'pending')->count();
@endphp

<header class="h-[62px] bg-white shadow-md flex items-center justify-between px-4 lg:px-6 sticky top-0 z-20">
    <div class="flex items-center gap-5 flex-1">
        <button type="button" onclick="toggleSidebar()" class="text-gray-700 text-xl">
            <i class="fas fa-bars"></i>
        </button>

        <div class="relative w-full max-w-md hidden sm:block">
            <i class="fas fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Penelusuran"
                   class="w-full bg-gray-50 border border-gray-300 rounded-md pl-10 pr-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1b3a63]/30">
        </div>
    </div>

    <div class="flex items-center gap-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#1b3a63] text-white flex items-center justify-center font-bold">
                {{ strtoupper(substr($admin->name, 0, 1)) }}
            </div>
            <span class="text-sm font-bold hidden sm:inline">{{ $admin->name }}</span>
            <i class="fas fa-chevron-down text-xs"></i>
        </div>

        <div class="relative">
            <i class="fas fa-bell text-xl"></i>
            @if($pendingCount > 0)
                <span class="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                    {{ $pendingCount > 9 ? '9+' : $pendingCount }}
                </span>
            @endif
        </div>
    </div>
</header>
