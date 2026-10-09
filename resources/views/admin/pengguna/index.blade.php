@extends('layouts.admin')
@section('title', 'Kelola Admin')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <div><h1 class="text-2xl font-bold text-gray-800">Kelola Akun Admin</h1></div>
    <button onclick="openModal('tambahAdmin')" class="px-4 py-2 bg-[#254261] text-white rounded-lg flex items-center gap-2 transition-colors hover:bg-[#1a2f45] shadow-sm font-semibold">
        <i class="fas fa-plus"></i> Tambah Admin
    </button>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 text-green-700 border-l-4 border-green-500 rounded shadow-sm flex justify-between items-center">
        <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
        <button onclick="this.parentElement.style.display='none'"><i class="fas fa-times"></i></button>
    </div>
@endif
@if($errors->any())
    <div class="mb-4 p-3 bg-red-50 text-red-700 border-l-4 border-red-500 rounded shadow-sm flex justify-between items-center">
        <span><i class="fas fa-exclamation-triangle mr-2"></i>{{ $errors->first() }}</span>
        <button onclick="this.parentElement.style.display='none'"><i class="fas fa-times"></i></button>
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Nama</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Email</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Role</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-sm text-center w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($admins as $admin)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $admin->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $admin->email }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="bg-blue-50 border border-blue-200 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                            {{ strtoupper(str_replace('_', ' ', $admin->role)) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if(auth('admin')->id() != $admin->id)
                        <form action="{{ route('admin.pengguna.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </form>
                        @else
                        <span class="text-gray-400 text-sm" title="Akun Anda"><i class="fas fa-lock"></i></span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-users-slash text-4xl mb-3 text-gray-300 block"></i>
                        Belum ada data admin.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 bg-gray-50/50 border-t">
        {{ $admins->links() }}
    </div>
</div>

<!-- Modal Tambah Admin -->
<div id="tambahAdmin" tabindex="-1" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-lg overflow-hidden">
        <div class="flex justify-between items-center border-b p-5">
            <h3 class="text-lg font-bold text-gray-900">Tambah Admin</h3>
            <button type="button" onclick="closeModal('tambahAdmin')" class="text-gray-400 hover:text-gray-900 transition-colors">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        <form action="{{ route('admin.pengguna.store') }}" method="POST" class="p-5">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] p-2.5" placeholder="Masukkan nama" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] p-2.5" placeholder="email@contoh.com" required>
            </div>

            <!-- Input Password dengan Toggle Mata -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input type="password" id="passwordInput" name="password" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] p-2.5 pr-10" placeholder="••••••••" required>
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-[#254261] focus:outline-none">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-1">Minimal 6 karakter.</p>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] p-2.5" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="admin_konten">Admin Konten</option>
                    <option value="admin_layanan">Admin Layanan</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button type="button" onclick="closeModal('tambahAdmin')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#254261] rounded-lg hover:bg-[#1a2f45] shadow-sm transition-colors">Simpan Admin</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Script untuk Toggle Password Mata
    function togglePassword() {
        const passwordInput = document.getElementById('passwordInput');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    // Tutup modal jika klik di luar area modal
    window.onclick = function(event) {
        const modal = document.getElementById('tambahAdmin');
        if (event.target == modal) {
            closeModal('tambahAdmin');
        }
    }
</script>
@endpush
@endsection
