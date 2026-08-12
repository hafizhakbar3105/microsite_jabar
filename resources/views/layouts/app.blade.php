<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - JABAR EXPLORE')</title>
    
    <!-- 1. Tailwind CSS --> 
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 2. Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- 3. Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- 4. Tailwind Custom Palette JABAR EXPLORE -->
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
<body class="bg-gray-50 font-sans text-gray-800 antialiased selection:bg-jabar-primary selection:text-white min-h-screen flex flex-col overflow-x-hidden">

    <!-- Responsive Modern Navbar -->
    <nav class="bg-jabar-dark text-white shadow-lg sticky top-0 z-50 border-b border-emerald-900/60 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="bg-gradient-to-tr from-jabar-primary to-emerald-500 text-white p-2 sm:p-2.5 rounded-xl sm:rounded-2xl shadow-md shadow-emerald-900/40 border border-white/10 ring-2 ring-emerald-500/20">
                        <i data-lucide="shield-check" class="w-5 h-5 sm:w-6 sm:h-6 stroke-[2.2]"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg sm:text-xl tracking-tight text-white leading-tight">JABAR EXPLORE</span>
                        <span class="hidden sm:block text-[10px] text-emerald-400 font-bold uppercase tracking-widest leading-none mt-0.5">Admin Panel</span>
                    </div>
                </div>
                 
                <!-- Nav Links -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    
                    <a href="{{ route('admin.dashboard') }}" class="text-emerald-100/70 hover:text-white hover:bg-white/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : '' }}">
                        <i data-lucide="bar-chart-3" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Dashboard</span>
                    </a>

                    <a href="{{ route('admin.links.index') ?? '#' }}" class="text-emerald-100/70 hover:text-white hover:bg-white/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2 {{ request()->routeIs('admin.links.*') ? 'bg-white/10 text-white' : '' }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Kelola Tautan</span>
                    </a>
                                   
                    <!-- Preview Button -->
                    <a href="/" target="_blank" class="bg-jabar-primary hover:bg-jabar-secondary text-white font-bold px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl text-xs sm:text-sm transition-all duration-200 flex items-center gap-1.5 sm:gap-2 shadow-md shadow-emerald-900/20 border border-emerald-600">
                        <span class="hidden sm:inline">Pratinjau Publik</span>
                        <span class="sm:hidden">Situs</span>
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>
                    
                    <!-- Form Aksi Logout (HTTP POST) -->
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit"
                                class="bg-rose-500/10 hover:bg-rose-500/20 text-rose-300 hover:text-rose-100 font-bold text-xs sm:text-sm px-3 py-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl border border-rose-500/30 transition-all flex items-center gap-1.5 sm:gap-2 ml-1">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="max-w-7xl mx-auto py-8 sm:py-10 px-4 sm:px-6 lg:px-8 flex-grow w-full">

        <!-- Flash Message Notification (Success) -->
        @if(session('success'))
            <div class="mb-8 p-4 sm:p-5 bg-emerald-50 border border-emerald-200 text-emerald-800 font-semibold rounded-2xl shadow-sm flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center shrink-0">
                    <i data-lucide="check-circle-2" class="w-5 h-5 text-jabar-primary"></i>
                </div>
                <span class="text-sm sm:text-base">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 text-center py-6 px-4 text-xs font-medium text-gray-500 mt-auto">
        &copy; {{ date('Y') }} <span class="font-bold text-jabar-primary">JABAR EXPLORE</span> &bull; Bio Link Ecosystem
    </footer>

    <!-- Inisialisasi Script Lucide -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>