@extends('layouts.app')

@section('content')

{{-- =========================================================
     HEADER HALAMAN PENGATURAN
     ========================================================= --}}
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">
        Pengaturan
    </h1>

    <p class="mt-1 text-lg text-gray-500">
        Atur preferensi platform sesuai kebutuhan anda
    </p>
</div>

{{-- =========================================================
     NOTIFIKASI
     Status tombol diambil dari database melalui $preferensi
     ========================================================= --}}
<div class="space-y-4">

    {{-- Update Konsultasi --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Update Konsultasi
            </h2>
            <p class="text-gray-500">
                Notifikasi terkait status dan balasan konsultasi
            </p>
        </div>

        <button
            type="button"
            data-setting="update_konsultasi"
            data-enabled="{{ $preferensi->update_konsultasi ? 'true' : 'false' }}"
            aria-label="Aktifkan atau nonaktifkan Update Konsultasi"
            aria-pressed="{{ $preferensi->update_konsultasi ? 'true' : 'false' }}"
            onclick="toggleSetting(this)"
            class="w-20 h-8 {{ $preferensi->update_konsultasi ? 'bg-[#1f3b5f]' : 'bg-gray-300' }} rounded-full relative transition-colors duration-300 disabled:opacity-60"
        >
            <span class="absolute {{ $preferensi->update_konsultasi ? 'right-1' : 'left-1' }} top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>

    {{-- Perubahan Jadwal Konsultasi --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Perubahan Jadwal Konsultasi
            </h2>
            <p class="text-gray-500">
                Pengingat dan perubahan jadwal konsultasi
            </p>
        </div>

        <button
            type="button"
            data-setting="perubahan_jadwal"
            data-enabled="{{ $preferensi->perubahan_jadwal ? 'true' : 'false' }}"
            aria-label="Aktifkan atau nonaktifkan Perubahan Jadwal Konsultasi"
            aria-pressed="{{ $preferensi->perubahan_jadwal ? 'true' : 'false' }}"
            onclick="toggleSetting(this)"
            class="w-20 h-8 {{ $preferensi->perubahan_jadwal ? 'bg-[#1f3b5f]' : 'bg-gray-300' }} rounded-full relative transition-colors duration-300 disabled:opacity-60"
        >
            <span class="absolute {{ $preferensi->perubahan_jadwal ? 'right-1' : 'left-1' }} top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>

    {{-- Updated Proyek --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Updated Proyek
            </h2>
            <p class="text-gray-500">
                Informasi perkembangan proyek anda
            </p>
        </div>

        <button
            type="button"
            data-setting="updated_proyek"
            data-enabled="{{ $preferensi->updated_proyek ? 'true' : 'false' }}"
            aria-label="Aktifkan atau nonaktifkan Updated Proyek"
            aria-pressed="{{ $preferensi->updated_proyek ? 'true' : 'false' }}"
            onclick="toggleSetting(this)"
            class="w-20 h-8 {{ $preferensi->updated_proyek ? 'bg-[#1f3b5f]' : 'bg-gray-300' }} rounded-full relative transition-colors duration-300 disabled:opacity-60"
        >
            <span class="absolute {{ $preferensi->updated_proyek ? 'right-1' : 'left-1' }} top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>

    {{-- Artikel Ensiklopedia Baru --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Artikel Ensiklopedia Baru
            </h2>
            <p class="text-gray-500">
                Notifikasi konten terbaru di ensiklopedia IT
            </p>
        </div>

        <button
            type="button"
            data-setting="artikel_ensiklopedia"
            data-enabled="{{ $preferensi->artikel_ensiklopedia ? 'true' : 'false' }}"
            aria-label="Aktifkan atau nonaktifkan Artikel Ensiklopedia Baru"
            aria-pressed="{{ $preferensi->artikel_ensiklopedia ? 'true' : 'false' }}"
            onclick="toggleSetting(this)"
            class="w-20 h-8 {{ $preferensi->artikel_ensiklopedia ? 'bg-[#1f3b5f]' : 'bg-gray-300' }} rounded-full relative transition-colors duration-300 disabled:opacity-60"
        >
            <span class="absolute {{ $preferensi->artikel_ensiklopedia ? 'right-1' : 'left-1' }} top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>

    {{-- Pesan hasil penyimpanan --}}
    <p
        id="notifikasi-status"
        class="text-sm hidden"
        role="status"
        aria-live="polite"
    ></p>

</div>

{{-- =========================================================
     MENU BANTUAN
     ========================================================= --}}
<div class="mt-4 space-y-4">

    {{-- FAQ --}}
    <a
        href="{{ route('pengaturan.faq') }}"
        class="bg-white rounded-xl p-5 flex items-center hover:bg-gray-50 transition-colors"
    >
        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">
            <i class="fas fa-question"></i>
        </div>

        <div class="ml-4">
            <h2 class="text-xl font-semibold text-gray-900">FAQ</h2>
            <p class="text-gray-500">
                Temukan jawaban untuk pertanyaan yang sering diajukan
            </p>
        </div>

        <i class="fas fa-arrow-right ml-auto text-2xl text-gray-900"></i>
    </a>

    {{-- Panduan Penggunaan Platform --}}
    <a
        href="{{ route('pengaturan.panduan') }}"
        class="bg-white rounded-xl p-5 flex items-center hover:bg-gray-50 transition-colors"
    >
        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">
            <i class="fas fa-book"></i>
        </div>

        <div class="ml-4">
            <h2 class="text-xl font-semibold text-gray-900">
                Panduan Penggunaan Platform
            </h2>
            <p class="text-gray-500">
                Pelajari menggunakan platform secara maksimal
            </p>
        </div>

        <i class="fas fa-arrow-right ml-auto text-2xl text-gray-900"></i>
    </a>

    {{-- Call Center --}}
    <a
        href="{{ route('pengaturan.call-center') }}"
        class="bg-white rounded-xl p-5 flex items-center hover:bg-gray-50 transition-colors"
    >
        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">
            <i class="fas fa-phone"></i>
        </div>

        <div class="ml-4">
            <h2 class="text-xl font-semibold text-gray-900">
                Hubungi Call Center
            </h2>
            <p class="text-gray-500">
                Butuh bantuan lebih lanjut? Tim kami siap membantu
            </p>
        </div>

        <i class="fas fa-arrow-right ml-auto text-2xl text-gray-900"></i>
    </a>

</div>

{{-- =========================================================
     JAVASCRIPT
     Menyimpan perubahan toggle ke database menggunakan fetch
     ========================================================= --}}
<script>
    const notifikasiUpdateUrl = @json(route('pengaturan.notifikasi.update'));
    const notifikasiCsrfToken = @json(csrf_token());

    function renderToggle(button, enabled) {
        const knob = button.querySelector('span');

        button.dataset.enabled = enabled ? 'true' : 'false';
        button.setAttribute('aria-pressed', enabled ? 'true' : 'false');

        if (enabled) {
            button.classList.remove('bg-gray-300');
            button.classList.add('bg-[#1f3b5f]');

            knob.classList.remove('left-1');
            knob.classList.add('right-1');
        } else {
            button.classList.remove('bg-[#1f3b5f]');
            button.classList.add('bg-gray-300');

            knob.classList.remove('right-1');
            knob.classList.add('left-1');
        }
    }

    function showNotifikasiStatus(message, success) {
        const status = document.getElementById('notifikasi-status');

        status.textContent = message;
        status.classList.remove('hidden', 'text-green-600', 'text-red-600');
        status.classList.add(success ? 'text-green-600' : 'text-red-600');
    }

    async function toggleSetting(button) {
        // Mencegah klik berulang saat proses penyimpanan berlangsung.
        if (button.disabled) {
            return;
        }

        const setting = button.dataset.setting;
        const previousValue = button.dataset.enabled === 'true';
        const newValue = !previousValue;

        // Perubahan tampilan dilakukan sementara.
        renderToggle(button, newValue);
        button.disabled = true;

        try {
            const response = await fetch(notifikasiUpdateUrl, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': notifikasiCsrfToken,
                },
                body: JSON.stringify({
                    update_konsultasi:
                        setting === 'update_konsultasi'
                            ? newValue
                            : document.querySelector('[data-setting="update_konsultasi"]').dataset.enabled === 'true',

                    perubahan_jadwal:
                        setting === 'perubahan_jadwal'
                            ? newValue
                            : document.querySelector('[data-setting="perubahan_jadwal"]').dataset.enabled === 'true',

                    updated_proyek:
                        setting === 'updated_proyek'
                            ? newValue
                            : document.querySelector('[data-setting="updated_proyek"]').dataset.enabled === 'true',

                    artikel_ensiklopedia:
                        setting === 'artikel_ensiklopedia'
                            ? newValue
                            : document.querySelector('[data-setting="artikel_ensiklopedia"]').dataset.enabled === 'true',
                }),
            });

            const result = await response.json();

            if (!response.ok || !result.success) {
                throw new Error(
                    result.message || 'Pengaturan notifikasi gagal disimpan.'
                );
            }

            showNotifikasiStatus(
                'Pengaturan notifikasi berhasil disimpan.',
                true
            );
        } catch (error) {
            // Jika gagal, kembalikan tombol ke status sebelumnya.
            renderToggle(button, previousValue);

            showNotifikasiStatus(
                error.message || 'Terjadi kesalahan. Silakan coba lagi.',
                false
            );
        } finally {
            button.disabled = false;
        }
    }
</script>

@endsection