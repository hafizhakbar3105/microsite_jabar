<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — JABAR EXPLORE</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS & Lucide Icons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind Custom Palette (Sama seperti Halaman Publik) -->
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
</head>
<body class="relative min-h-screen font-sans antialiased flex flex-col justify-between p-4 sm:p-6 bg-cover bg-center bg-fixed selection:bg-jabar-primary selection:text-white overflow-x-hidden"
      style="background-image: url('{{ asset('images/bg-wisata.jpg') }}');">

    <!-- OVERLAY BACKGROUND GELAP -->
    <div class="fixed inset-0 bg-black/50 backdrop-blur-[3px] z-0"></div>

    <!-- CONTAINER UTAMA -->
    <main class="relative z-10 w-full max-w-md mx-auto my-auto py-8">

        <!-- AMBIENT GLOW BLOBS -->
        <div class="absolute -top-8 -left-8 w-44 h-44 bg-emerald-400/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-8 -right-8 w-44 h-44 bg-teal-300/30 rounded-full blur-3xl pointer-events-none"></div>

        <!-- FROSTED GLASS CONTAINER CARD -->
        <div class="relative w-full bg-white/85 backdrop-blur-2xl border border-white/70 rounded-[2.2rem] p-6 sm:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">

            <!-- Header Brand -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-tr from-jabar-primary to-emerald-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-900/20 ring-4 ring-white/90 mx-auto mb-4">
                    <i data-lucide="shield-check" class="w-8 h-8 stroke-[2.2]"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Login Admin</h1>
                <p class="text-xs sm:text-sm font-medium text-gray-600 mt-1">Masuk untuk mengelola ekosistem JABAR EXPLORE</p>
            </div>

            <!-- Form Container -->
            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Display Alert Error -->
                @if($errors->any())
                    <div class="bg-rose-500/10 border border-rose-300/60 p-4 rounded-2xl flex items-start gap-3">
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-600 shrink-0 mt-0.5"></i>
                        <p class="text-xs font-semibold text-rose-700 leading-snug">{{ $errors->first() }}</p>
                    </div>
                @endif

                <!-- Input Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-700">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="admin@jabarexplore.id"
                               class="w-full pl-10 pr-4 py-3 bg-white/90 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-jabar-primary focus:border-jabar-primary font-medium text-sm text-gray-900 transition-all placeholder:text-gray-400 shadow-sm">
                    </div>
                </div>

                <!-- Input Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-700">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                               placeholder="••••••••"
                               class="w-full pl-10 pr-4 py-3 bg-white/90 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-jabar-primary focus:border-jabar-primary font-medium text-sm text-gray-900 transition-all placeholder:text-gray-400 shadow-sm">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-jabar-primary hover:bg-jabar-secondary text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-900/20 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center gap-2 text-sm">
                        Masuk Dashboard <i data-lucide="arrow-right" class="w-4 h-4 stroke-[2.5]"></i>
                    </button>
                </div>
            </form>

            <!-- Tautan Kembali ke Utama -->
            <div class="mt-6 pt-5 border-t border-gray-200/80 text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-gray-600 hover:text-jabar-primary transition-colors">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Kembali ke Halaman Utama
                </a>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 py-4 text-center text-xs font-medium text-white/90 drop-shadow-md">
        <p>&copy; 2026 <span class="font-bold text-emerald-300">JABAR EXPLORE</span>. All rights reserved.</p>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>