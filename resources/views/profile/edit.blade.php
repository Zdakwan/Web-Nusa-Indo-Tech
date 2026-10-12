@extends('layouts.app')

@section('title', 'Edit Profil - Nusa Indo Tech')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Edit Profil</h2>
    </div>

    {{-- Form penghapusan foto dibuat terpisah dari form utama --}}
    <form id="delete-avatar-form"
          action="{{ route('profile.avatar.delete') }}"
          method="POST">
        @csrf
        @method('DELETE')
    </form>

    <form id="profile-form"
          action="{{ route('profile.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="flex flex-col lg:flex-row gap-6">
        @csrf

        {{-- Kolom kiri: Foto profil --}}
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col items-center">
                <h3 class="w-full text-left font-bold text-gray-900 mb-6">
                    Foto Profil
                </h3>

                <div class="w-48 h-48 rounded-full overflow-hidden bg-gray-100 border-4 border-gray-50 flex items-center justify-center mb-6 relative group">
                    @if($client->avatar)
                        <img
                            id="avatar-preview"
                            src="{{ asset('storage/' . $client->avatar) }}"
                            alt="Foto Profil"
                            class="w-full h-full object-cover">

                        <i
                            id="avatar-icon"
                            class="fas fa-user text-6xl text-gray-300 mt-4 hidden">
                        </i>
                    @else
                        <img
                            id="avatar-preview"
                            src=""
                            alt="Foto Profil"
                            class="hidden w-full h-full object-cover">

                        <i
                            id="avatar-icon"
                            class="fas fa-user text-6xl text-gray-300 mt-4">
                        </i>
                    @endif
                </div>

                <input
                    type="file"
                    id="avatar-upload"
                    name="avatar"
                    class="hidden"
                    accept="image/jpeg,image/png">

                <label
                    for="avatar-upload"
                    class="bg-[#d1d5db] hover:bg-gray-400 text-gray-800 px-6 py-2.5 rounded-lg font-semibold text-sm cursor-pointer transition w-full text-center flex justify-center items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Ganti Foto
                </label>

                {{-- Tombol hapus hanya muncul jika foto tersimpan --}}
                @if($client->avatar)
                    <button
                        type="submit"
                        form="delete-avatar-form"
                        onclick="return confirm('Yakin ingin menghapus foto profil?')"
                        class="bg-red-100 hover:bg-red-200 text-red-700 px-6 py-2.5 rounded-lg font-semibold text-sm transition w-full text-center mt-3">
                        <i class="fas fa-trash-alt mr-2"></i>
                        Hapus Foto
                    </button>
                @endif

                <p class="text-xs text-gray-500 mt-3 text-center">
                    Format JPG/PNG, maksimal 2 MB setelah crop.
                </p>

                @error('avatar')
                    <span class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        {{-- Kolom kanan: Informasi pribadi --}}
        <div class="w-full lg:w-2/3">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6">
                    Informasi Pribadi
                </h3>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $client->name) }}"
                            required
                            class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">

                        @error('name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $client->email) }}"
                            required
                            class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">

                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            No Telepon <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $client->phone) }}"
                            required
                            class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">

                        @error('phone')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            Alamat
                        </label>

                        <input
                            type="text"
                            name="address"
                            value="{{ old('address', $client->address) }}"
                            class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            Perusahaan
                        </label>

                        <input
                            type="text"
                            name="company"
                            value="{{ old('company', $client->company) }}"
                            class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">
                            Jabatan
                        </label>

                        <input
                            type="text"
                            name="position"
                            value="{{ old('position', $client->position) }}"
                            class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-8">
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-bold text-sm transition shadow-sm">
                        Simpan Perubahan
                    </button>

                    <a
                        href="{{ route('profile.index') }}"
                        class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 px-6 py-2.5 rounded-lg font-bold text-sm transition">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </form>

    {{-- Modal crop foto --}}
    <div
        id="crop-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4">

        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-bold text-gray-900">
                    Sesuaikan Foto Profil
                </h3>

                <button
                    type="button"
                    id="crop-close"
                    class="text-gray-500 hover:text-gray-800 text-2xl"
                    aria-label="Tutup">
                    &times;
                </button>
            </div>

            <div class="p-4">
                <div class="w-full h-72 sm:h-96 bg-gray-100 overflow-hidden">
                    <img
                        id="crop-image"
                        src=""
                        alt="Pratinjau crop"
                        class="block max-w-full">
                </div>

                <div class="flex justify-center gap-3 mt-4">
                    <button
                        type="button"
                        id="zoom-out"
                        class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100"
                        aria-label="Perkecil">
                        <i class="fas fa-search-minus"></i>
                    </button>

                    <button
                        type="button"
                        id="zoom-in"
                        class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100"
                        aria-label="Perbesar">
                        <i class="fas fa-search-plus"></i>
                    </button>

                    <button
                        type="button"
                        id="crop-reset"
                        class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">
                        Reset
                    </button>
                </div>
            </div>

            <div class="flex justify-end gap-3 p-4 border-t">
                <button
                    type="button"
                    id="crop-cancel"
                    class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                    Batal
                </button>

                <button
                    type="button"
                    id="crop-apply"
                    class="px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold">
                    Gunakan Foto
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">

<style>
    #crop-modal .cropper-view-box,
    #crop-modal .cropper-face {
        border-radius: 50%;
    }

    #crop-modal .cropper-view-box {
        outline: 2px solid rgba(255, 255, 255, 0.9);
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>

<script>
    let cropper = null;
    let temporaryImageUrl = null;
    let previewImageUrl = null;

    const avatarInput = document.getElementById('avatar-upload');
    const cropModal = document.getElementById('crop-modal');
    const cropImage = document.getElementById('crop-image');
    const cropApplyButton = document.getElementById('crop-apply');
    const profileForm = document.getElementById('profile-form');

    // Buka modal ketika pengguna memilih foto
    avatarInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            return;
        }

        if (!['image/jpeg', 'image/png'].includes(file.type)) {
            alert('Pilih foto berformat JPG atau PNG.');
            this.value = '';
            return;
        }

        if (file.size > 10 * 1024 * 1024) {
            alert('Ukuran foto maksimal 10 MB sebelum crop.');
            this.value = '';
            return;
        }

        if (typeof Cropper === 'undefined') {
            alert('Fitur crop belum berhasil dimuat. Periksa koneksi internet.');
            this.value = '';
            return;
        }

        closeCropModal();

        temporaryImageUrl = URL.createObjectURL(file);

        cropModal.classList.remove('hidden');
        cropModal.classList.add('flex');

        cropImage.onload = function () {
            cropper = new Cropper(cropImage, {
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 0.8,
                responsive: true,
                background: false,
                guides: true,
                center: true,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false
            });
        };

        cropImage.onerror = function () {
            alert('Foto tidak dapat dibuka. Silakan pilih foto lain.');
            avatarInput.value = '';
            closeCropModal();
        };

        cropImage.src = temporaryImageUrl;
    });

    // Tutup modal dan bersihkan objek crop
    function closeCropModal() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }

        cropImage.onload = null;
        cropImage.onerror = null;
        cropImage.removeAttribute('src');

        if (temporaryImageUrl) {
            URL.revokeObjectURL(temporaryImageUrl);
            temporaryImageUrl = null;
        }

        cropModal.classList.add('hidden');
        cropModal.classList.remove('flex');
    }

    // Batalkan pemilihan foto
    function cancelCrop() {
        closeCropModal();
        avatarInput.value = '';
    }

    document.getElementById('crop-close').addEventListener('click', cancelCrop);
    document.getElementById('crop-cancel').addEventListener('click', cancelCrop);

    cropModal.addEventListener('click', function (event) {
        if (event.target === cropModal) {
            cancelCrop();
        }
    });

    // Perbesar atau perkecil foto
    document.getElementById('zoom-in').addEventListener('click', function () {
        if (cropper) {
            cropper.zoom(0.1);
        }
    });

    document.getElementById('zoom-out').addEventListener('click', function () {
        if (cropper) {
            cropper.zoom(-0.1);
        }
    });

    // Kembalikan posisi crop ke kondisi awal
    document.getElementById('crop-reset').addEventListener('click', function () {
        if (cropper) {
            cropper.reset();
        }
    });

    // Terapkan hasil crop pada foto profil
    cropApplyButton.addEventListener('click', function () {
        if (!cropper) {
            return;
        }

        const canvas = cropper.getCroppedCanvas({
            width: 512,
            height: 512,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });

        if (!canvas) {
            alert('Foto gagal diproses. Silakan coba kembali.');
            return;
        }

        canvas.toBlob(function (blob) {
            if (!blob) {
                alert('Foto gagal diproses. Silakan coba kembali.');
                return;
            }

            if (blob.size > 2 * 1024 * 1024) {
                alert('Ukuran foto setelah crop melebihi 2 MB. Perkecil atau pilih foto lain.');
                return;
            }

            const croppedFile = new File(
                [blob],
                'avatar.jpg',
                { type: 'image/jpeg' }
            );

            const transfer = new DataTransfer();
            transfer.items.add(croppedFile);
            avatarInput.files = transfer.files;

            const preview = document.getElementById('avatar-preview');
            const icon = document.getElementById('avatar-icon');

            if (previewImageUrl) {
                URL.revokeObjectURL(previewImageUrl);
            }

            previewImageUrl = URL.createObjectURL(blob);
            preview.src = previewImageUrl;
            preview.classList.remove('hidden');

            if (icon) {
                icon.classList.add('hidden');
            }

            closeCropModal();
        }, 'image/jpeg', 0.9);
    });

    // Cegah formulir disimpan saat modal crop masih terbuka
    profileForm.addEventListener('submit', function (event) {
        if (!cropModal.classList.contains('hidden')) {
            event.preventDefault();
            alert('Terapkan atau batalkan crop foto terlebih dahulu.');
        }
    });
</script>
@endpush