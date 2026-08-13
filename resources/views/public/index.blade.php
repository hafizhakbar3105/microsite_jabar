<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JABAR EXPLORE — Official Portal</title>
    <meta name="description" content="Jelajahi Pesona Jawa Barat. Panduan Resmi Wisata, Kuliner, & Hidden Gem Pasundan.">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        jabar: {
                            gold: '#D4AF37',
                            emerald: '#0F5B38',
                            teal: '#1C8A56',
                            dark: '#06140D',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- CUSTOM ANIMATIONS & LUXURY STYLING -->
    <style>
        /* Floating Animation */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(1deg); }
        }
        .animate-float {
            animation: floatSlow 5s ease-in-out infinite;
        }

        /* Gold Shimmer Sweep Effect */
        @keyframes shimmer {
            0% { transform: translateX(-150%) skewX(-20deg); }
            100% { transform: translateX(250%) skewX(-20deg); }
        }
        .shimmer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                90deg, 
                transparent, 
                rgba(255, 255, 255, 0.2), 
                transparent
            );
            transform: translateX(-150%) skewX(-20deg);
            z-index: 10;
        }
        .group:hover .shimmer-card::before {
            animation: shimmer 1.2s ease-in-out;
        }

        /* Staggered Entrance Animation */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(24px) scale(0.96); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .animate-fade-up {
            animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .grid-card-item {
            opacity: 0;
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .grid-card-item:nth-child(1) { animation-delay: 0.1s; }
        .grid-card-item:nth-child(2) { animation-delay: 0.2s; }
        .grid-card-item:nth-child(3) { animation-delay: 0.3s; }
        .grid-card-item:nth-child(4) { animation-delay: 0.4s; }
        .grid-card-item:nth-child(5) { animation-delay: 0.5s; }
        .grid-card-item:nth-child(6) { animation-delay: 0.6s; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.3);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(16, 185, 129, 0.4);
            border-radius: 10px;
        }
    </style>
</head>
<body class="relative min-h-screen font-sans flex flex-col justify-between p-4 sm:p-8 md:p-12 bg-cover bg-center bg-fixed selection:bg-emerald-500 selection:text-white overflow-x-hidden antialiased text-white"
      style="background-image: url('{{ asset('images/Bandung.jpg') }}');">

    <!-- ELEMEN AUDIO ANGKLUNG -->
    <audio id="angklungAudio" loop preload="auto" autoplay>
        <source src="{{ asset('audio/angklung.mp3') }}" type="audio/mpeg">
    </audio>

    <!-- TOMBOL KONTROL MUSIK FLOATING (KANAN BAWAH) -->
    <button id="musicToggleBtn" onclick="toggleMusic()" title="Putar / Hentikan Musik Angklung"
            class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full bg-slate-900/80 backdrop-blur-xl border border-amber-400/40 text-amber-300 flex items-center justify-center text-base shadow-2xl hover:scale-110 hover:border-amber-300 active:scale-95 transition-all duration-300 group">
        <i id="musicIcon" class="fa-solid fa-compact-disc text-amber-300 animate-spin"></i>
        <span class="absolute -inset-1 rounded-full bg-amber-400/20 blur-sm group-hover:bg-amber-400/40 transition-all -z-10"></span>
    </button>

    <!-- OVERLAY GRADIENT LUKSURIUS (DARK EMERALD GLASS EFFECT) -->
    <div class="fixed inset-0 bg-gradient-to-b from-black/70 via-emerald-950/40 to-black/90 backdrop-blur-[3px] z-0"></div>

    <!-- MAIN CONTAINER (CONTAINER DILEBARKAN UNTUK GRID TAMPILAN MEWAH) -->
    <main class="relative z-10 w-full max-w-4xl mx-auto my-auto py-6 flex flex-col items-center">
        
        <!-- HEADER PROFILE SECTION -->
        <div class="animate-fade-up flex flex-col items-center text-center w-full max-w-xl mb-10">
            
            <!-- AVATAR PROFILE DENGAN AMBIENT RING GOLD & EMERALD GLOW -->
            <div class="relative mb-5 group animate-float">
                <div class="absolute -inset-2 rounded-full bg-gradient-to-r from-emerald-500 via-amber-300 to-teal-400 blur-xl opacity-75 group-hover:opacity-100 group-hover:scale-110 transition-all duration-500"></div>
                
                <div class="relative w-28 h-28 sm:w-32 sm:h-32 rounded-full ring-4 ring-white/30 shadow-2xl bg-white overflow-hidden p-1 group-hover:ring-amber-300/80 transition-all duration-500">
                    <img src="{{ asset('images/jabar.png') }}" alt="Logo Jabar Explore" class="w-full h-full object-cover rounded-full">
                </div>
                
                <span class="absolute bottom-1 right-1 w-8 h-8 bg-gradient-to-tr from-emerald-600 to-teal-400 ring-2 ring-white rounded-full flex items-center justify-center text-white text-xs shadow-lg" title="Terverifikasi Resmi">
                    <i class="fa-solid fa-check text-white font-black"></i>
                </span>
            </div>

            <!-- OFFICIAL BADGE MEWAH -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-xl border border-amber-400/30 text-amber-300 text-[11px] font-bold tracking-widest uppercase mb-4 shadow-2xl">
                <i class="fa-solid fa-crown text-amber-400 text-xs"></i> Official Tourism Guide
            </div>

            <!-- TITLE & HANDLE -->
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white mb-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.6)]">
                @jabar.explore
            </h1>
            
            <!-- BIO DESKRIPSI -->
            <p class="text-xs sm:text-sm text-gray-200 leading-relaxed font-medium mb-6 max-w-md drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)]">
                Eksplorasi Pesona Alam, Warisan Budaya, Kuliner Khas, & Destinasi Impian Pasundan Jawa Barat.
            </p>

            <!-- SOSIAL MEDIA ICONS GLOWING -->
            <div class="flex items-center justify-center gap-4 w-full">
                <a href="https://www.instagram.com/disparbudjabar/" target="_blank" title="Instagram" class="w-11 h-11 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center text-lg shadow-lg hover:bg-gradient-to-tr hover:from-amber-500 hover:via-rose-500 hover:to-purple-600 hover:border-transparent hover:scale-110 active:scale-95 transition-all duration-300">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@smiling.westjava" target="_blank" title="TikTok" class="w-11 h-11 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center text-lg shadow-lg hover:bg-black hover:border-transparent hover:scale-110 active:scale-95 transition-all duration-300">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
                <a href="https://www.youtube.com/@WestJava_Tourism" target="_blank" title="YouTube" class="w-11 h-11 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center text-lg shadow-lg hover:bg-red-600 hover:border-transparent hover:scale-110 active:scale-95 transition-all duration-300">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>

        </div>

        <!-- DIVIDER DEKORATIF ORNAMEN PASUNDAN -->
        <div class="w-full flex items-center justify-center gap-4 mb-8 opacity-60">
            <div class="h-px w-24 bg-gradient-to-r from-transparent to-amber-300"></div>
            <i class="fa-solid fa-gem text-xs text-amber-300"></i>
            <div class="h-px w-24 bg-gradient-to-l from-transparent to-amber-300"></div>
        </div>

        <!-- DAFTAR TAUTAN MODEL GRID (2 KOLOM RESPONSINTIF) -->
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
            @forelse($links as $link)
                @php
                    $clickUrl = route('public.redirect', $link->id);
                @endphp

                <a href="{{ $clickUrl }}" target="_blank" class="grid-card-item group relative overflow-hidden block w-full p-4 sm:p-5 bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-xl rounded-2xl border border-white/20 hover:border-emerald-400/80 shadow-2xl hover:shadow-emerald-950/80 hover:-translate-y-1.5 active:scale-[0.98] transition-all duration-300 shimmer-card">
                    
                    <!-- BACKGROUND ACCENT GLOW saat HOVER -->
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 via-transparent to-amber-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="flex items-center gap-4 relative z-10">
                        
                        <!-- ICON / GAMBAR THUMBNAIL MEWAH -->
                        <div class="w-14 h-14 rounded-xl bg-white/15 backdrop-blur-md border border-white/30 text-white flex-shrink-0 flex items-center justify-center text-xl group-hover:bg-gradient-to-br group-hover:from-emerald-500 group-hover:to-teal-600 group-hover:border-transparent group-hover:scale-105 group-hover:rotate-3 transition-all duration-300 shadow-lg overflow-hidden">
                            @if(!empty($link->image))
                                <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->title }}" class="w-full h-full object-cover">
                            @elseif(!empty($link->icon))
                                <i class="{{ $link->icon }} group-hover:text-white"></i>
                            @else
                                <i class="fa-solid fa-compass text-emerald-300 group-hover:text-white"></i>
                            @endif
                        </div>
                        
                        <!-- TEXT CONTENT -->
                        <div class="overflow-hidden flex-grow pr-1 text-left">
                            <h2 class="font-bold text-white text-base sm:text-[15px] leading-tight transition-colors truncate drop-shadow-sm group-hover:text-amber-300">
                                {{ $link->title }}
                            </h2>
                            @if(!empty($link->description))
                                <p class="text-xs text-gray-200 line-clamp-2 mt-1 font-normal opacity-85 group-hover:opacity-100 leading-relaxed">
                                    {{ $link->description }}
                                </p>
                            @else
                                <p class="text-[11px] text-emerald-300/80 mt-1 font-semibold flex items-center gap-1">
                                    <span>Jelajahi Sekarang</span>
                                    <i class="fa-solid fa-chevron-right text-[9px]"></i>
                                </p>
                            @endif
                        </div>

                        <!-- TOMBOL ARROW KANAN -->
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-white/70 group-hover:bg-amber-400 group-hover:text-slate-900 group-hover:translate-x-1 transition-all duration-300 border border-white/10 shadow-md">
                            <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-12 px-4 bg-white/10 backdrop-blur-xl rounded-3xl border border-white/20 text-center text-white">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-white/20 flex items-center justify-center text-amber-300 text-2xl animate-bounce">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <h3 class="text-base font-bold mb-1">Belum Ada Destinasi</h3>
                    <p class="text-xs text-gray-300 font-medium max-w-xs mx-auto leading-relaxed">
                        Rekomendasi tempat wisata & hidden gem Jawa Barat akan ditambahkan segera.
                    </p>
                </div>
            @endforelse
        </div>

    </main>

    <!-- FOOTER MEWAH -->
    <footer class="relative z-10 py-6 text-center text-xs font-medium text-white/70 drop-shadow-md tracking-wider">
        <p>&copy; 2026 <span class="text-amber-300 font-bold">JABAR EXPLORE</span> — Pesona Pariwisata Jawa Barat.</p>
    </footer>

    <!-- SCRIPT AUDIO NARASI & BACKSOUND ANGKLUNG -->
    <script>
        let hasSpoken = false;
        let isMusicPlaying = false;

        const angklungAudio = document.getElementById('angklungAudio');
        const musicIcon = document.getElementById('musicIcon');

        // 1. PENYETELAN SUARA NARASI (SPEECH SYNTHESIS)
        let availableVoices = [];
        function loadVoices() {
            if ('speechSynthesis' in window) {
                availableVoices = window.speechSynthesis.getVoices();
            }
        }

        if ('speechSynthesis' in window) {
            loadVoices();
            window.speechSynthesis.onvoiceschanged = loadVoices;
        }

        function playWelcomeAudio() {
            if (hasSpoken) return;

            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
                window.speechSynthesis.resume();

                const text = "Wilujeung sumping di Jawa Barat Explore";
                const utterance = new SpeechSynthesisUtterance(text);
                
                utterance.lang = 'id-ID';
                utterance.rate = 0.9;
                utterance.pitch = 1.0;

                if (availableVoices.length > 0) {
                    const indoVoice = availableVoices.find(v => v.lang.includes('id') || v.lang.includes('su'));
                    if (indoVoice) utterance.voice = indoVoice;
                }

                utterance.onend = function() {
                    hasSpoken = true;
                };

                utterance.onerror = function(e) {
                    console.log("SpeechSynthesis terhalang kebijakan browser.", e);
                };

                window.speechSynthesis.speak(utterance);
            }
        }

        // 2. FUNGSI MEMUTAR MUSIK LATAR ANGKLUNG
        function startBgMusic() {
            if (angklungAudio) {
                angklungAudio.volume = 0.25; // Volume 25% agar narasi tetap terdengar lembut
                const playPromise = angklungAudio.play();

                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        isMusicPlaying = true;
                        updateMusicUI();
                    }).catch(err => {
                        console.log("Autoplay musik ditahan browser. Menunggu interaksi pertama.", err);
                    });
                }
            }
        }

        // 3. KONTROL MANUAL TOMBOL PLAY / PAUSE
        function toggleMusic() {
            if (!angklungAudio) return;
            
            if (angklungAudio.paused) {
                angklungAudio.play();
                isMusicPlaying = true;
            } else {
                angklungAudio.pause();
                isMusicPlaying = false;
            }
            updateMusicUI();
        }

        function updateMusicUI() {
            if (isMusicPlaying) {
                musicIcon.className = "fa-solid fa-compact-disc text-amber-300 animate-spin";
            } else {
                musicIcon.className = "fa-solid fa-volume-xmark text-gray-400";
            }
        }

        // 4. JALANKAN OTOMATIS SAAT MEMUAT HALAMAN
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                playWelcomeAudio();
                startBgMusic();
            }, 400);
        });

        // 5. PENANGANAN BEBAS BLOKIR BROWSER (MEMUTAR PADA INTERAKSI PERTAMA)
        const unlockEvents = ['pointerdown', 'touchstart', 'click', 'scroll', 'keydown'];
        
        function unlockAudio() {
            if (!hasSpoken) {
                playWelcomeAudio();
            }
            startBgMusic();

            unlockEvents.forEach(evt => {
                document.removeEventListener(evt, unlockAudio);
            });
        }

        unlockEvents.forEach(evt => {
            document.addEventListener(evt, unlockAudio, { once: true });
        });
    </script>

</body>
</html>