@extends('layouts.app')

@section('content')

{{-- =========================================================
     HEADER HALAMAN FAQ
     Menampilkan tombol kembali dan judul halaman
     ========================================================= --}}
<div class="mb-6">

    {{-- Tombol Kembali --}}
    <a
        href="{{ route('pengaturan.index') }}"
        class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors"
    >
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali
    </a>

    <h1 class="text-3xl font-bold text-gray-900 mt-4">
        Frequently Ask Question
    </h1>

</div>


{{-- =========================================================
     PENCARIAN FAQ
     Menampilkan kolom pencarian pertanyaan
     ========================================================= --}}
<div class="mb-5">

    <div class="relative">
        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

        <input
            type="text"
            placeholder="Penelusuran"
            class="w-full border border-gray-300 rounded-lg pl-11 pr-4 py-3 bg-transparent focus:outline-none focus:ring-1 focus:ring-gray-400"
        >
    </div>

</div>


{{-- =========================================================
     DAFTAR FAQ
     Menampilkan daftar pertanyaan dan jawaban
     ========================================================= --}}
<div class="space-y-3">

    {{-- =====================================================
         FAQ 1
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Bagaimana cara membuat akun di platform Nusa Indo Technology?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Untuk membuat akun, silakan melakukan pendaftaran melalui halaman
                registrasi dan mengisi data yang diperlukan sesuai dengan informasi
                yang diminta.
            </p>
        </div>

    </div>


    {{-- =====================================================
         FAQ 2
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Apa saja data yang diperlukan untuk melakukan pendaftaran akun?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Anda perlu mengisi beberapa informasi dasar seperti nama lengkap,
                email, nomor telepon, informasi perusahaan, jabatan, serta membuat
                password akun. Pastikan data yang diberikan sudah benar dan sesuai
                agar proses verifikasi akun dapat berjalan dengan lancar.
            </p>
        </div>

    </div>


    {{-- =====================================================
         FAQ 3
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Berapa lama proses verifikasi akun setelah melakukan pendaftaran?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Informasi mengenai proses verifikasi akun akan diberikan setelah
                pendaftaran berhasil dilakukan.
            </p>
        </div>

    </div>


    {{-- =====================================================
         FAQ 4
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Bagaimana cara mengajukan pendaftaran konsultasi?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Pendaftaran konsultasi dapat dilakukan melalui menu
                Konsultasi kemudian memilih menu Booking.
            </p>
        </div>

    </div>


    {{-- =====================================================
         FAQ 5
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Bagaimana cara melihat status pendaftaran konsultasi saya?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Status pendaftaran konsultasi dapat dilihat melalui menu
                Konsultasi Saya.
            </p>
        </div>

    </div>


    {{-- =====================================================
         FAQ 6
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Bagaimana cara melihat jadwal konsultasi yang telah disetujui?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Jadwal konsultasi yang telah disetujui dapat dilihat melalui
                detail jadwal konsultasi.
            </p>
        </div>

    </div>


    {{-- =====================================================
         FAQ 7
         ===================================================== --}}
    <div class="faq-item">

        <button
            type="button"
            onclick="toggleFaq(this)"
            class="faq-question w-full flex items-center justify-between px-4 py-4 bg-gray-100 rounded-xl shadow-md text-left text-gray-900 transition-colors duration-300"
        >
            <span class="font-medium">
                Apa yang harus dilakukan jika saya ingin mengubah jadwal konsultasi?
            </span>

            <i class="fas fa-chevron-right text-sm transition-transform duration-300"></i>
        </button>

        <div class="faq-answer hidden px-4 py-4 bg-gray-100 rounded-b-xl text-gray-600">
            <p>
                Silakan menghubungi pihak Nusa Indo Technology untuk mendapatkan
                bantuan terkait perubahan jadwal konsultasi.
            </p>
        </div>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT FAQ
     Membuka dan menutup jawaban FAQ
     ========================================================= --}}
<script>
    function toggleFaq(button) {
        const answer = button.nextElementSibling;
        const icon = button.querySelector('i');

        const isHidden = answer.classList.contains('hidden');

        if (isHidden) {
            // Membuka jawaban FAQ
            answer.classList.remove('hidden');

            button.classList.remove('bg-gray-100', 'text-gray-900');
            button.classList.add('bg-[#1f3b5f]', 'text-white');

            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down');

        } else {
            // Menutup jawaban FAQ
            answer.classList.add('hidden');

            button.classList.remove('bg-[#1f3b5f]', 'text-white');
            button.classList.add('bg-gray-100', 'text-gray-900');

            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right');
        }
    }
</script>

@endsection