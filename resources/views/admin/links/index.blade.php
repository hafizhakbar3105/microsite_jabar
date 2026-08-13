@extends('layouts.app')

@section('title', 'Kelola Tautan - JABAR EXPLORE')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- HEADER SEKSI & TOMBOL TAMBAH -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Kelola Tautan Bio-Link</h1>
            <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">Atur, susun, dan pantau seluruh tautan destinasi & informasi JABAR EXPLORE.</p>
        </div>
        <a href="{{ route('admin.links.create') }}" 
           class="inline-flex items-center gap-2 bg-jabar-primary hover:bg-jabar-secondary text-white font-bold py-2.5 px-5 rounded-xl shadow-md shadow-emerald-900/10 hover:shadow-lg hover:-translate-y-0.5 transition-all text-xs sm:text-sm self-start sm:self-auto">
            <i data-lucide="plus-circle" class="w-4 h-4 stroke-[2.5]"></i>
            <span>Tambah Tautan Baru</span>
        </a>
    </div>

    <!-- TABLE CONTAINER CARD -->
    <div class="bg-white border border-gray-200/80 rounded-3xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-200/80 text-[11px] font-bold uppercase tracking-wider text-gray-500">
                        <th class="py-4 px-6">Tautan & Judul</th>
                        <th class="py-4 px-6">URL Tujuan</th>
                        <th class="py-4 px-6 text-center">Total Klik</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                    @forelse($links as $link)
                        <tr class="hover:bg-emerald-50/30 transition-colors">
                            
                            <!-- Judul & Gambar/Ikon -->
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <!-- Container yang sudah ditambahkan overflow-hidden -->
                                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-jabar-primary flex items-center justify-center shrink-0 border border-emerald-100/60 font-bold overflow-hidden">
                                        @if(!empty($link->image))
                                            <!-- Menampilkan Gambar -->
                                            <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->title }}" class="w-full h-full object-cover">
                                        @elseif(!empty($link->icon))
                                            <!-- Menampilkan Ikon (Jika gambar tidak ada) -->
                                            <i class="{{ $link->icon }} text-base"></i>
                                        @else
                                            <!-- Default Ikon Lucide -->
                                            <i data-lucide="link" class="w-5 h-5"></i>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-bold text-gray-900 truncate">{{ $link->title }}</p>
                                        <p class="text-xs text-gray-400">ID: #{{ $link->id }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- URL Destination -->
                            <td class="py-4 px-6 max-w-xs">
                                <a href="{{ $link->url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs text-emerald-700 hover:text-jabar-primary font-semibold hover:underline truncate max-w-full">
                                    <span class="truncate">{{ $link->url }}</span>
                                    <i data-lucide="external-link" class="w-3.5 h-3.5 shrink-0 opacity-70"></i>
                                </a>
                            </td>

                            <!-- Total Klik -->
                            <td class="py-4 px-6 text-center">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-amber-50 text-amber-800 text-xs font-extrabold border border-amber-200/60">
                                    <i data-lucide="mouse-pointer-click" class="w-3.5 h-3.5 text-amber-600"></i>
                                    {{ number_format($link->clicks ?? 0) }}
                                </span>
                            </td>

                            <!-- Status (Aktif / Nonaktif) -->
                            <td class="py-4 px-6 text-center">
                                @if($link->is_active ?? true)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100/80 text-emerald-800 text-xs font-bold border border-emerald-200">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-bold border border-gray-200">
                                        <span class="w-2 h-2 rounded-full bg-gray-400"></span> Nonaktif
                                    </span>
                                @endif
                            </td>

                            <!-- Tombol Aksi -->
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.links.edit', $link->id) }}" 
                                       class="p-2 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-lg transition-colors border border-amber-200/60"
                                       title="Edit Tautan">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.links.destroy', $link->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tautan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg transition-colors border border-rose-200/60"
                                                title="Hapus Tautan">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <!-- STATE KOSONG -->
                        <tr>
                            <td colspan="5" class="py-12 text-center">
                                <div class="w-16 h-16 bg-emerald-50 text-jabar-primary rounded-2xl flex items-center justify-center mx-auto mb-4 border border-emerald-100">
                                    <i data-lucide="link-2-off" class="w-8 h-8"></i>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 mb-1">Belum Ada Tautan</h3>
                                <p class="text-xs text-gray-500 mb-5">Mulai dengan menambahkan tautan destinasi pertama Anda.</p>
                                <a href="{{ route('admin.links.create') }}" class="inline-flex items-center gap-2 bg-jabar-primary hover:bg-jabar-secondary text-white font-bold py-2.5 px-4 rounded-xl text-xs transition-all shadow-md">
                                    <i data-lucide="plus" class="w-4 h-4"></i> Buat Tautan Baru
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINASI (JIKA ADA) -->
        @if(method_exists($links, 'hasPages') && $links->hasPages())
            <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-200/80">
                {{ $links->links() }}
            </div>
        @endif
    </div>

</div>
@endsection