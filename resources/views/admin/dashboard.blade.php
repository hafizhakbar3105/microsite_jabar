@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">
    
    <!-- Header Dashboard -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Dashboard Analytics</h1>
            <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">Ringkasan performa & statistik akses tautan Bio-Link Anda.</p>
        </div>
        <a href="{{ route('admin.links.index') }}" class="inline-flex items-center gap-2 bg-jabar-primary hover:bg-jabar-secondary text-white font-bold py-2.5 px-5 rounded-xl shadow-md shadow-emerald-900/10 hover:shadow-lg hover:-translate-y-0.5 transition-all text-xs sm:text-sm self-start sm:self-auto">
            Kelola Tautan <i data-lucide="arrow-right" class="w-4 h-4 stroke-[2.5]"></i>
        </a>
    </div>

    <!-- 1. SUMMARY CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        
        <!-- Card: Total Tautan -->
        <div class="relative overflow-hidden bg-white border border-gray-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Tautan</span>
                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-jabar-primary flex items-center justify-center group-hover:bg-jabar-primary group-hover:text-white transition-colors duration-200 shadow-sm">
                    <i data-lucide="link-2" class="w-5 h-5 stroke-[2.2]"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2.5">
                <span class="text-4xl font-extrabold text-gray-900">{{ $totalLinks }}</span>
                <span class="inline-flex items-center gap-1 text-xs font-bold text-emerald-800 bg-emerald-100/80 px-2.5 py-0.5 rounded-full border border-emerald-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> {{ $activeLinks }} Aktif
                </span>
            </div>
        </div>

        <!-- Card: Total Klik -->
        <div class="relative overflow-hidden bg-white border border-gray-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Akses Tautan</span>
                <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center group-hover:bg-teal-600 group-hover:text-white transition-colors duration-200 shadow-sm">
                    <i data-lucide="mouse-pointer-click" class="w-5 h-5 stroke-[2.2]"></i>
                </div>
            </div>
            <div class="flex items-baseline">
                <span class="text-4xl font-extrabold text-gray-900">{{ number_format($totalClicks) }}</span>
                <span class="text-xs font-medium text-gray-400 ml-2">Total Klik</span>
            </div>
        </div>

        <!-- Card: Top Link -->
        <div class="relative overflow-hidden bg-white border border-gray-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tautan Terpopuler</span>
                <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors duration-200 shadow-sm">
                    <i data-lucide="trophy" class="w-5 h-5 stroke-[2.2]"></i>
                </div>
            </div>
            @if($topLink)
                <p class="text-lg font-bold text-gray-900 truncate mb-2" title="{{ $topLink->title }}">{{ $topLink->title }}</p>
                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-800 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">
                    <i data-lucide="trending-up" class="w-3.5 h-3.5 text-amber-600"></i> {{ number_format($topLink->clicks) }} Klik
                </span>
            @else
                <p class="text-base font-semibold text-gray-400">Belum ada data</p>
            @endif
        </div>

    </div>

    <!-- 2 & 3. CHARTS AREA -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Bar Chart (Top 5 Links) -->
        <div class="bg-white border border-gray-200/80 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
                <div>
                    <h3 class="text-base font-extrabold text-gray-900">Perbandingan Klik (Top 5)</h3>
                    <p class="text-xs text-gray-500 font-medium">Performa tautan dengan statistik terbanyak</p>
                </div>
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-jabar-primary flex items-center justify-center">
                    <i data-lucide="bar-chart-3" class="w-4 h-4"></i>
                </div>
            </div>
            
            <div class="relative w-full h-72">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- Doughnut Chart (Distribusi Minat) -->
        <div class="bg-white border border-gray-200/80 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
                <div>
                    <h3 class="text-base font-extrabold text-gray-900">Distribusi Minat Audiens</h3>
                    <p class="text-xs text-gray-500 font-medium">Persentase akses tiap kategori tautan</p>
                </div>
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-jabar-primary flex items-center justify-center">
                    <i data-lucide="pie-chart" class="w-4 h-4"></i>
                </div>
            </div>
            
            <div class="relative w-full h-72 flex justify-center items-center">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>

    </div>
</div>

<!-- ========================================== -->
<!-- SCRIPT CHART.JS CUSTOM PALETTE JABAR EXPLORE -->
<!-- ========================================== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Menyuntikkan Data PHP ke JavaScript
    const chartLabels = @json($chartLabels);
    const chartData = @json($chartData);

    // Palet Warna On-Brand JABAR EXPLORE (Hijau Utama, Secondary, Teal, Accent, Mint)
    const bgColors = ['#0F5B38', '#1C8A56', '#2DD4BF', '#E29578', '#A7F3D0'];
    const hoverBgColors = ['#0A1E14', '#0F5B38', '#14B8A6', '#D87A5B', '#6EE7B7'];

    // Konfigurasi Global Font (Plus Jakarta Sans)
    Chart.defaults.font.family = '"Plus Jakarta Sans", sans-serif';
    Chart.defaults.font.weight = '600';
    Chart.defaults.color = '#4B5563';

    // 1. BAR CHART INISIALISASI
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Klik',
                data: chartData,
                backgroundColor: bgColors,
                hoverBackgroundColor: hoverBgColors,
                borderWidth: 0,
                borderRadius: 8,
                maxBarThickness: 38,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0, color: '#9CA3AF', font: { size: 11 } },
                    grid: { color: '#F3F4F6', drawBorder: false }
                },
                x: {
                    ticks: { color: '#4B5563', font: { size: 11, weight: '700' } },
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#0A1E14',
                    titleFont: { size: 13, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 10,
                    cornerRadius: 8,
                    displayColors: false
                }
            }
        }
    });

    // 2. DOUGHNUT CHART INISIALISASI
    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData,
                backgroundColor: bgColors,
                hoverBackgroundColor: hoverBgColors,
                borderWidth: 2,
                borderColor: '#FFFFFF',
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { 
                    position: 'right',
                    labels: {
                        boxWidth: 12,
                        boxHeight: 12,
                        padding: 15,
                        font: { size: 11, weight: '600' },
                        color: '#374151'
                    }
                },
                tooltip: {
                    backgroundColor: '#0A1E14',
                    titleFont: { size: 13, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 10,
                    cornerRadius: 8
                }
            }
        }
    });
</script>
@endsection