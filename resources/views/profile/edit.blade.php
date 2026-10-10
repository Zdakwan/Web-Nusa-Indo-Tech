@extends('layouts.app')

@section('title', 'Edit Profil - Nusa Indo Tech')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Edit Profil</h2>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-6">
        @csrf

        <!-- Kolom Kiri: Foto Profil -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col items-center">
                <h3 class="w-full text-left font-bold text-gray-900 mb-6">Foto Profil</h3>

                <div class="w-48 h-48 rounded-full overflow-hidden bg-gray-100 border-4 border-gray-50 flex items-center justify-center mb-6 relative group">
                    @if($client->avatar)
                        <img id="avatar-preview" src="{{ asset('storage/' . $client->avatar) }}" alt="Foto Profil" class="w-full h-full object-cover">
                    @else
                        <img id="avatar-preview" class="hidden w-full h-full object-cover">
                        <i id="avatar-icon" class="fas fa-user text-6xl text-gray-300 mt-4"></i>
                    @endif
                </div>

                <input type="file" id="avatar-upload" name="avatar" class="hidden" accept="image/*" onchange="previewImage(this)">

                <label for="avatar-upload" class="bg-[#d1d5db] hover:bg-gray-400 text-gray-800 px-6 py-2.5 rounded-lg font-semibold text-sm cursor-pointer transition w-full text-center flex justify-center items-center">
                    <i class="fas fa-edit mr-2"></i> Ganti Foto
                </label>
                @error('avatar')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Kolom Kanan: Informasi Pribadi -->
        <div class="w-full lg:w-2/3">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Informasi Pribadi</h3>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $client->name) }}" required class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                        @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $client->email) }}" required class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                        @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">No Telepon <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" required class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                        @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Alamat</label>
                        <input type="text" name="address" value="{{ old('address', $client->address) }}" class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Perusahaan</label>
                        <input type="text" name="company" value="{{ old('company', $client->company) }}" class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Jabatan</label>
                        <input type="text" name="position" value="{{ old('position', $client->position) }}" class="w-full bg-[#f3f4f6] border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-8">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-bold text-sm transition shadow-sm">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('profile.index') }}" class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 px-6 py-2.5 rounded-lg font-bold text-sm transition">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('avatar-preview').src = e.target.result;
                document.getElementById('avatar-preview').classList.remove('hidden');

                let icon = document.getElementById('avatar-icon');
                if(icon) {
                    icon.classList.add('hidden');
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
