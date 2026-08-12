<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JABAR EXPLORE — Official Links</title>
    <meta name="description" content="Jelajahi Pesona Jawa Barat. Panduan Resmi Wisata, Kuliner, & Hidden Gem.">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN dengan Custom Palette -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        jabar: {
                            primary: '#0F5B38',
                            secondary: '#1C8A56',
                            accent: '#E29578',
                            dark: '#0A1E14',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- CUSTOM ANIMATIONS & EFEK VIVID -->
    <style>
        /* Animasi Melayang (Floating) */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float {
            animation: floatSlow 4s ease-in-out infinite;
        }

        /* Animasi Glow Pulsating */
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.08); }
        }
        .animate-pulse-glow {
            animation: pulseGlow 5s ease-in-out infinite;
        }

        /* Efek Kilatan Sinar (Shimmer Sweep) pada Link Card */
        @keyframes shimmerSweep {
            0% { transform: translateX(-150%) skewX(-12deg); }
            100% { transform: translateX(250%) skewX(-12deg); }
        }
        .shimmer-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                90deg, 
                transparent, 
                rgba(255, 255, 255, 0.4), 
                transparent
            );
            transform: translateX(-150%) skewX(-12deg);
        }
        .group:hover .shimmer-effect::before {
            animation: shimmerSweep 1s ease-in-out;
        }

        /* Animasi Pop Entrance */
        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.92) translateY(15px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        .animate-pop-in {
            animation: popIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="relative min-h-screen font-sans flex flex-col items-center justify-between p-4 sm:p-6 bg-cover bg-center bg-fixed selection:bg-jabar-primary selection:text-white overflow-x-hidden"
      style="background-image: url('{{ asset('images/Bandung.jpg') }}');">

    <!-- OVERLAY BACKGROUND SEIMBANG -->
    <div class="fixed inset-0 bg-black/45 backdrop-blur-[3px] z-0"></div>

    <!-- CONTAINER UTAMA (GLASS CARD WITH GLOW BLOBS) -->
    <main class="relative z-10 w-full max-w-md mx-auto my-auto py-6 animate-pop-in">
        
        <!-- AMBIENT GLOW BLOBS (EFEK CAHAYA DIBELAKANG KACA) -->
        <div class="absolute -top-8 -left-8 w-44 h-44 bg-emerald-400/30 rounded-full blur-3xl animate-pulse-glow pointer-events-none"></div>
        <div class="absolute -bottom-8 -right-8 w-44 h-44 bg-teal-300/30 rounded-full blur-3xl animate-pulse-glow pointer-events-none" style="animation-delay: 2.5s;"></div>

        <!-- FROSTED GLASS CONTAINER -->
        <div class="relative w-full bg-white/80 backdrop-blur-2xl border border-white/70 rounded-[2.2rem] p-6 sm:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.3)] flex flex-col items-center text-center">
            
            <!-- 1. AVATAR PROFILE DENGAN RING & ANIMASI FLOAT -->
            <div class="relative mb-4 group animate-float">
                <!-- Aura Glow di Belakang Avatar -->
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 blur-md opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300"></div>
                
                <div class="relative w-24 h-24 sm:w-28 sm:h-28 rounded-full bg-gradient-to-tr from-jabar-primary via-emerald-600 to-teal-500 text-white flex items-center justify-center font-extrabold text-3xl sm:text-4xl shadow-2xl ring-4 ring-white/90 group-hover:scale-105 transition-transform duration-300">
                    JE
                </div>
                
                <!-- Badge Centang Hijau (Pulsating) -->
                <span class="absolute bottom-1 right-1 w-7 h-7 bg-emerald-500 border-2 border-white rounded-full flex items-center justify-center text-white text-xs shadow-lg animate-pulse" title="Akun Resmi">
                    <i class="fa-solid fa-check"></i>
                </span>
            </div>

            <!-- 2. PIL OFFICIAL & HANDLE NAME -->
            <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100/90 border border-emerald-300/60 text-jabar-primary text-[11px] font-bold tracking-wide uppercase mb-2.5 shadow-sm hover:scale-105 transition-transform">
                <i class="fa-solid fa-shield-halved text-xs text-emerald-600"></i> Official Tourism Guide
            </div>

            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-1 drop-shadow-sm">
                @jabar.explore
            </h1>
            
            <!-- 3. BIO DESKRIPSI -->
            <p class="text-xs sm:text-sm text-gray-600 max-w-xs leading-relaxed font-medium mb-5">
                Panduan Rekomendasi Wisata Alam, Pantai, Kuliner Khas, & Hidden Gem Pasundan.
            </p>

            <!-- 4. SOSIAL MEDIA ICONS (DENGAN COLORFUL GLOW ON HOVER) -->
            <div class="flex items-center justify-center gap-3 mb-6 w-full">
                <!-- Instagram -->
                <a href="#" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-700 flex items-center justify-center text-sm shadow-sm hover:bg-gradient-to-tr hover:from-amber-500 hover:via-rose-500 hover:to-purple-600 hover:text-white hover:border-transparent hover:shadow-lg hover:shadow-rose-500/30 hover:-translate-y-1 transition-all duration-200">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <!-- TikTok -->
                <a href="#" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-700 flex items-center justify-center text-sm shadow-sm hover:bg-black hover:text-white hover:border-transparent hover:shadow-lg hover:shadow-cyan-500/30 hover:-translate-y-1 transition-all duration-200">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
                <!-- YouTube -->
                <a href="#" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-700 flex items-center justify-center text-sm shadow-sm hover:bg-red-600 hover:text-white hover:border-transparent hover:shadow-lg hover:shadow-red-500/30 hover:-translate-y-1 transition-all duration-200">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <!-- Email -->
                <a href="#" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-700 flex items-center justify-center text-sm shadow-sm hover:bg-jabar-primary hover:text-white hover:border-transparent hover:shadow-lg hover:shadow-emerald-600/30 hover:-translate-y-1 transition-all duration-200">
                    <i class="fa-solid fa-envelope"></i>
                </a>
            </div>

            <!-- GARIS PEMBATAS DEKORATIF -->
            <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent mb-6"></div>

            <!-- 5. DAFTAR TAUTAN DINAMIS (DENGAN EFEK SHIMMER & HOVER ELEVATION) -->
            <div class="w-full space-y-3.5">
                @forelse($links as $link)
                    @php
                        $clickUrl = route('links.click', $link->id) ?? (route('click', $link->id) ?? url('/click/' . $link->id));
                    @endphp

                    <a href="{{ $clickUrl }}" target="_blank" class="group relative overflow-hidden block w-full p-3.5 bg-white/90 backdrop-blur-sm rounded-2xl border border-gray-200/80 shadow-sm hover:shadow-xl hover:shadow-emerald-900/10 hover:border-emerald-500/50 hover:-translate-y-1 transition-all duration-200 text-left shimmer-effect">
                        <div class="flex items-center justify-between relative z-10">
                            <div class="flex items-center gap-3.5 overflow-hidden">
                                <!-- Container Icon (dengan Animasi Rotasi Halus) -->
                                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-jabar-primary flex-shrink-0 flex items-center justify-center text-base group-hover:bg-jabar-primary group-hover:text-white group-hover:rotate-6 group-hover:scale-105 transition-all duration-200 shadow-sm">
                                    @if(!empty($link->icon))
                                        <i class="{{ $link->icon }}"></i>
                                    @else
                                        <i class="fa-solid fa-compass"></i>
                                    @endif
                                </div>
                                
                                <!-- Judul & Deskripsi Tautan -->
                                <div class="overflow-hidden">
                                    <h2 class="font-bold text-gray-900 group-hover:text-jabar-primary text-sm leading-tight transition-colors truncate">
                                        {{ $link->title }}
                                    </h2>
                                    @if(!empty($link->description))
                                        <p class="text-[11px] text-gray-500 truncate mt-0.5 font-medium group-hover:text-gray-700 transition-colors">
                                            {{ $link->description }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Arrow Icon (dengan Animasi Geser & Bounce) -->
                            <div class="flex-shrink-0 ml-2 w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-emerald-100 group-hover:text-jabar-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all duration-200">
                                <i class="fa-solid fa-arrow-up-right-from-square text-[11px]"></i>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- EMPTY STATE -->
                    <div class="py-8 px-4 bg-gray-50/90 rounded-2xl border-2 border-dashed border-gray-200 text-center">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-emerald-100 text-jabar-primary flex items-center justify-center text-lg animate-bounce">
                            <i class="fa-solid fa-link-slash"></i>
                        </div>
                        <h3 class="text-sm font-bold text-gray-800 mb-1">Belum Ada Tautan</h3>
                        <p class="text-xs text-gray-500 font-medium max-w-[200px] mx-auto">
                            Tautan wisata & rekomendasi akan segera muncul di sini.
                        </p>
                    </div>
                @endforelse
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 py-4 text-center text-xs font-medium text-white/90 drop-shadow-md">
        <p>&copy; 2026 <span class="font-bold text-emerald-300">JABAR EXPLORE</span>. All rights reserved.</p>
    </footer>

</body>
</html>