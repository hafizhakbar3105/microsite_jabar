@extends('layouts.app')

@section('title', 'Tambah Link Baru - Admin Dashboard')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 sm:space-y-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 sm:p-6 rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a]">
        <div>
            <h1 class="text-xl sm:text-2xl font-black text-slate-900 flex items-center gap-3">
                <a href="{{ route('admin.links.index') }}" class="bg-amber-200 hover:bg-amber-300 p-1.5 rounded-lg border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a] transition-all hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none">
                    <i data-lucide="arrow-left" class="w-5 h-5 stroke-[2.5]"></i>
                </a>
                Tambah Link Baru
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1.5 ml-10">Lengkapi formulir di bawah untuk membuat tautan.</p>
        </div>
    </div>

    <!-- Container Form -->
    <div class="bg-white rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] p-6 sm:p-8">

        <!-- PENTING: Wajib gunakan enctype="multipart/form-data" untuk upload file -->
        <form action="{{ route('admin.links.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Field: Judul Tautan -->
            <div class="space-y-2">
                <label for="title" class="block text-sm font-extrabold text-slate-900">Judul Tautan <span class="text-rose-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Portofolio Dribbble" required
                       class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-900 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 font-medium text-slate-900 transition-all">
                @error('title')
                    <p class="text-xs font-bold text-rose-600 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Field: URL Tujuan -->
            <div class="space-y-2">
                <label for="url" class="block text-sm font-extrabold text-slate-900">URL Tujuan <span class="text-rose-500">*</span></label>
                <input type="url" id="url" name="url" value="{{ old('url') }}" placeholder="<https://dribbble.com/username>" required
                       class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-900 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 font-medium text-slate-900 transition-all">
                @error('url')
                    <p class="text-xs font-bold text-rose-600 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Field: Upload Gambar & Component Interactive Preview -->
            <div class="space-y-3">
                <label for="image" class="block text-sm font-extrabold text-slate-900">Ikon / Logo <span class="text-slate-400 font-medium">(Opsional)</span></label>

                <div id="preview-wrapper" class="relative overflow-hidden rounded-2xl border-2 border-slate-900 bg-slate-50">
                    <!-- State Kosong -->
                    <div id="preview-empty" role="button" tabindex="0" class="flex flex-col items-center justify-center gap-3 py-10 px-6 text-center cursor-pointer hover:bg-slate-100 transition-colors">
                        <div class="w-14 h-14 rounded-2xl bg-amber-200 border-2 border-slate-900 flex items-center justify-center shadow-[3px_3px_0px_0px_#0f172a]">
                            <i data-lucide="image-plus" class="w-7 h-7 text-slate-900 stroke-[2.5]"></i>
                        </div>
                        <div>
                            <p class="text-sm font-extrabold text-slate-900">Klik untuk memilih gambar</p>
                            <p class="text-xs font-medium text-slate-500 mt-1">Format yang didukung: JPG, PNG, WEBP (Maks. 2MB)</p>
                        </div>
                    </div>

                    <!-- State Terisi (Preview File) -->
                    <div id="preview-filled" class="hidden">
                        <div class="bg-slate-900/5">
                            <img id="preview-img" src="" alt="Preview" class="w-full max-h-72 object-contain">
                        </div>
                        <div class="flex items-center justify-between gap-3 px-4 py-3 bg-white border-t-2 border-slate-900">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 shrink-0 rounded-xl bg-emerald-100 border-2 border-emerald-600/30 flex items-center justify-center">
                                    <i data-lucide="image-check" class="w-5 h-5 text-emerald-600 stroke-[2.5]"></i>
                                </div>
                                <div class="min-w-0">
                                    <p id="preview-file-name" class="text-sm font-extrabold text-slate-900 truncate">file.png</p>
                                    <p id="preview-file-size" class="text-[11px] font-semibold text-slate-500">0 KB</p>
                                </div>
                            </div>
                            <button type="button" id="preview-remove" class="bg-rose-100 hover:bg-rose-200 text-rose-700 font-extrabold text-xs px-3.5 py-2 rounded-lg border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a]">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <input type="file" id="image" name="image" accept="image/*" class="sr-only">
                @error('image')
                    <p class="text-xs font-bold text-rose-600 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Field: Custom Checkbox Component -->
            <div class="pt-2">
                <label for="is_active" class="cursor-pointer select-none">
                    <div class="flex items-center justify-between gap-4 bg-slate-50 border-2 border-slate-900 rounded-2xl p-4 shadow-[3px_3px_0px_0px_#0f172a]">
                        <div class="flex items-center gap-3">
                            <span class="bg-blue-100 text-blue-600 p-2 rounded-xl border border-blue-200">
                                <i data-lucide="eye" class="w-5 h-5 stroke-[2.5]"></i>
                            </span>
                            <div class="flex flex-col">
                                <span class="text-sm font-extrabold text-slate-900">Tampilkan Tautan ke Publik</span>
                                <span id="is_active_hint" class="text-[11px] font-semibold text-slate-500">Tautan akan terlihat di halaman publik</span>
                            </div>
                        </div>
                        <input type="checkbox" id="is_active" name="is_active" class="sr-only peer" checked>
                        <span class="relative w-12 h-7 bg-slate-300 peer-checked:bg-emerald-400 rounded-full border-2 border-slate-900 transition-colors shrink-0 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full after:border-2 after:border-slate-900 transition-transform peer-checked:after:translate-x-5"></span>
                    </div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="pt-6 border-t-2 border-dashed border-slate-200 flex gap-4 justify-end">
                <a href="{{ route('admin.links.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-900 font-extrabold py-3 px-6 rounded-xl border-2 border-slate-900 shadow-[3px_3px_0px_0px_#0f172a]">
                    Batal
                </a>
                <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-slate-950 font-extrabold py-3 px-8 rounded-xl border-2 border-slate-900 shadow-[3px_3px_0px_0px_#0f172a] flex items-center gap-2">
                    <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection