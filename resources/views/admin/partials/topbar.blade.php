@php
    $admin = Auth::guard('admin')->user();
    $pendingCount = \App\Models\Konsultasi::where('status', 'pending')->count();
@endphp

<header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4 lg:px-8 z-10 relative">
    
    <!-- Bagian Kiri -->
    <div class="flex items-center">
        <!-- Kosongkan atau isi dengan fitur pencarian -->
    </div>

    <!-- Bagian Kanan (Lonceng & Profil) -->
    <div class="flex items-center gap-4">
        
        <!-- Wrapper Notifikasi -->
        <div class="relative inline-block text-left">
            <!-- Tombol Lonceng (Diberi ID 'bellButton' agar dikenali JS) -->
            <button type="button" id="bellButton" onclick="toggleNotifDropdown()" class="relative p-2 text-[#1a2f45] hover:text-blue-700 transition focus:outline-none cursor-pointer">
                <i class="fas fa-bell text-xl"></i>
                
                @if($pendingCount > 0)
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[10px] font-bold leading-none text-white bg-red-600 rounded-full border-2 border-white">
                    {{ $pendingCount }}
                </span>
                @endif
            </button>

            <!-- Kotak Dropdown Pop-up -->
            <div id="dropdownNotifikasi" class="hidden absolute right-0 mt-3 w-80 bg-white rounded-xl shadow-lg border border-gray-100 z-50 overflow-hidden">
                <div class="px-4 py-3 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h3 class="text-sm font-extrabold text-gray-800">Notifikasi</h3>
                    <button type="button" class="text-[11px] text-blue-600 hover:underline font-semibold cursor-pointer">Tandai dibaca</button>
                </div>
                
                <div class="max-h-[300px] overflow-y-auto">
                    @if($pendingCount > 0)
                        <a href="#" class="block px-4 py-3 bg-blue-50/50 hover:bg-gray-50 border-b border-gray-50 transition">
                            <div class="flex gap-3">
                                <div class="mt-1 w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                    <i class="fas fa-file-alt text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-900">Konsultasi Baru</p>
                                    <p class="text-[11px] text-gray-600 mt-0.5 leading-snug">Ada {{ $pendingCount }} permintaan menunggu diproses.</p>
                                </div>
                            </div>
                        </a>
                    @else
                        <div class="px-4 py-6 text-center text-gray-500 text-xs">
                            Belum ada notifikasi baru.
                        </div>
                    @endif
                </div>

                <div class="px-4 py-2 border-t border-gray-100 text-center bg-gray-50 hover:bg-gray-100 transition">
                    <a href="{{ route('admin.dashboard') }}" class="text-xs text-blue-600 hover:text-blue-800 font-extrabold block py-1">Lihat Semua</a>
                </div>
            </div>
        </div>

        <!-- Info Profil Topbar -->
        <div class="hidden sm:flex items-center gap-2 ml-2">
            <span class="font-bold text-sm text-gray-800">{{ $admin->name ?? 'SuperAdmin' }}</span>
        </div>

    </div>
</header>

<!-- JAVASCRIPT UNTUK MEMUNCULKAN POP-UP -->
<script>
    function toggleNotifDropdown() {
        const dropdown = document.getElementById('dropdownNotifikasi');
        if(dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
        } else {
            dropdown.classList.add('hidden');
        }
    }

    // Menutup pop-up secara otomatis saat klik di luar lonceng/kotak
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdownNotifikasi');
        const bellBtn = document.getElementById('bellButton');
        
        if (dropdown && bellBtn) {
            if (!dropdown.contains(event.target) && !bellBtn.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        }
    });
</script>