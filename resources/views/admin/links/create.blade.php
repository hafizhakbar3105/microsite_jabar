@extends('layouts.app')

@section('title', 'Tambah Link Baru - Admin Dashboard')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 sm:p-6 rounded-xl border border-gray-200 shadow-sm">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900 flex items-center gap-3">
                <a href="{{ route('admin.links.index') }}" class="text-gray-400 hover:text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                </a>
                Tambah Link Baru
            </h1>
            <p class="text-sm text-gray-500 mt-1 sm:ml-12 ml-10">Lengkapi formulir di bawah untuk membuat tautan baru.</p>
        </div>
    </div>

    <!-- Container Form -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 sm:p-8">

        <!-- PENTING: Wajib gunakan enctype="multipart/form-data" untuk upload file -->
        <form action="{{ route('admin.links.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Field: Judul Tautan -->
            <div class="space-y-2">
                <label for="title" class="block text-sm font-semibold text-gray-700">Judul Tautan <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Portofolio Dribbble" required
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 transition-all placeholder-gray-400">
                @error('title')
                    <p class="text-xs font-medium text-red-500 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Field: URL Tujuan -->
            <div class="space-y-2">
                <label for="url" class="block text-sm font-semibold text-gray-700">URL Tujuan <span class="text-red-500">*</span></label>
                <input type="url" id="url" name="url" value="{{ old('url') }}" placeholder="https://dribbble.com/username" required
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 transition-all placeholder-gray-400">
                @error('url')
                    <p class="text-xs font-medium text-red-500 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Field: Upload Gambar & Component Interactive Preview -->
            <div class="space-y-2">
                <label for="image" class="block text-sm font-semibold text-gray-700">Ikon / Logo <span class="text-gray-400 font-normal">(Opsional)</span></label>

                <div id="preview-wrapper" class="relative overflow-hidden rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition-colors">
                    <!-- State Kosong -->
                    <div id="preview-empty" role="button" tabindex="0" class="flex flex-col items-center justify-center gap-3 py-10 px-6 text-center cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <i data-lucide="image-plus" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Klik untuk memilih gambar</p>
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                        </div>
                    </div>

                    <!-- State Terisi (Preview File) -->
                    <div id="preview-filled" class="hidden">
                        <div class="bg-gray-100/50 p-4 flex justify-center">
                            <img id="preview-img" src="" alt="Preview" class="w-auto max-h-48 object-contain rounded-md shadow-sm">
                        </div>
                        <div class="flex items-center justify-between gap-3 px-4 py-3 bg-white border-t border-gray-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 shrink-0 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <i data-lucide="image" class="w-5 h-5 text-blue-600"></i>
                                </div>
                                <div class="min-w-0">
                                    <p id="preview-file-name" class="text-sm font-semibold text-gray-900 truncate">file.png</p>
                                    <p id="preview-file-size" class="text-xs text-gray-500">0 KB</p>
                                </div>
                            </div>
                            <button type="button" id="preview-remove" class="text-red-500 hover:text-red-700 hover:bg-red-50 font-medium text-sm px-3 py-1.5 rounded-md transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <input type="file" id="image" name="image" accept="image/*" class="sr-only">
                @error('image')
                    <p class="text-xs font-medium text-red-500 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Field: Custom Checkbox Component -->
            <div class="pt-2">
                <label for="is_active" class="cursor-pointer select-none">
                    <div class="flex items-center justify-between gap-4 bg-white border border-gray-200 rounded-lg p-4 hover:border-blue-300 transition-colors">
                        <div class="flex items-center gap-3">
                            <span class="bg-blue-50 text-blue-600 p-2 rounded-lg">
                                <i data-lucide="eye" class="w-5 h-5"></i>
                            </span>
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-gray-900">Tampilkan Tautan ke Publik</span>
                                <span id="is_active_hint" class="text-xs text-gray-500">Tautan akan terlihat di halaman profil Anda</span>
                            </div>
                        </div>
                        <!-- Cek nilai old('is_active') -->
                        <div class="relative flex items-center">
                            <input type="checkbox" id="is_active" name="is_active" class="sr-only peer" {{ old('is_active', true) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </div>
                    </div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="pt-6 border-t border-gray-200 flex gap-3 justify-end">
                <a href="{{ route('admin.links.index') }}" class="bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-5 rounded-lg border border-gray-300 transition-colors">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk Interactive Image Preview -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image');
        const previewEmpty = document.getElementById('preview-empty');
        const previewFilled = document.getElementById('preview-filled');
        const previewImg = document.getElementById('preview-img');
        const previewFileName = document.getElementById('preview-file-name');
        const previewFileSize = document.getElementById('preview-file-size');
        const btnRemove = document.getElementById('preview-remove');

        // Membuka dialog file saat area "preview-empty" diklik
        if(previewEmpty && fileInput) {
            previewEmpty.addEventListener('click', () => {
                fileInput.click();
            });
        }

        // Memproses file yang dipilih dan menampilkan preview
        if(fileInput) {
            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Update teks nama & ukuran file
                    previewFileName.textContent = file.name;
                    const sizeKB = (file.size / 1024).toFixed(1);
                    previewFileSize.textContent = sizeKB + ' KB';

                    // Membaca file dan menampilkan gambar
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImg.src = event.target.result;
                        previewEmpty.classList.add('hidden');
                        previewFilled.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Menghapus gambar dan mengembalikan ke state awal
        if(btnRemove && fileInput) {
            btnRemove.addEventListener('click', function() {
                fileInput.value = ''; // Reset input file
                previewImg.src = '';
                previewEmpty.classList.remove('hidden');
                previewFilled.classList.add('hidden');
            });
        }
    });
</script>
@endsection