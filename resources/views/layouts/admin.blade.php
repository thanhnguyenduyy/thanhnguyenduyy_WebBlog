<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ $title ?? 'Dashboard' }} | thanhnguyenduyy</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#00A3FF',
                            dark: '#18181B',   /* Zinc-900 */
                            panel: '#27272A',  /* Zinc-800 */
                            border: '#3F3F46'  /* Zinc-700 */
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif']
                    }
                }
            }
        }
    </script>
    <style>
        .selection\:bg-brand-blue::selection { background-color: #00A3FF; color: black; }
        .animate-in { animation: fadeIn 0.5s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #3f3f46; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #52525b; }
    </style>
    @stack('styles')
</head>
<body class="antialiased selection:bg-brand-blue selection:text-black">
    <div id="admin-app" class="flex h-screen bg-zinc-50 dark:bg-brand-dark text-zinc-900 dark:text-zinc-100 overflow-hidden font-sans transition-colors duration-300">
        <!-- Sidebar -->
        @include('admin.components.sidebar')

        <main class="flex-1 flex flex-col min-w-0 bg-zinc-50 dark:bg-brand-dark relative transition-colors duration-300">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-blue/5 rounded-full blur-[100px] pointer-events-none"></div>

            <!-- Top Header -->
            <header class="h-16 border-b border-zinc-200 dark:border-brand-border/50 flex items-center justify-between px-8 bg-white/80 dark:bg-brand-dark/80 backdrop-blur-md z-10 sticky top-0 transition-colors duration-300">
                <div class="flex items-center text-zinc-500 space-x-2 text-sm">
                    <span class="opacity-50">Admin</span>
                    <span>/</span>
                    <span class="text-zinc-800 dark:text-white capitalize font-medium">{{ $currentView ?? 'Dashboard' }}</span>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="relative group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-0 top-1/2 -translate-y-1/2 text-zinc-400 dark:text-zinc-600 group-hover:text-brand-blue transition-colors"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input 
                            type="text" 
                            placeholder="Search anything..." 
                            class="bg-transparent border-none pl-6 text-sm text-zinc-600 dark:text-zinc-300 placeholder-zinc-400 dark:placeholder-zinc-700 focus:outline-none focus:placeholder-zinc-500 w-64 transition-all"
                        />
                    </div>
                    <div class="flex items-center space-x-3 pl-6 border-l border-zinc-200 dark:border-zinc-800">
                        <div class="text-right hidden md:block">
                            <p class="text-xs font-bold text-zinc-800 dark:text-white">Nguyễn Duy Thanh</p>
                            <p class="text-[10px] text-zinc-500">Super Admin</p>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-zinc-200 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 overflow-hidden ring-2 ring-transparent hover:ring-brand-blue transition-all cursor-pointer">
                            <img src="https://picsum.photos/100/100" alt="Admin" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content Area -->
            <div class="flex-1 overflow-auto p-8 relative z-0 scroll-smooth">
                <div class="max-w-7xl mx-auto h-full">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Global Notifications -->
    @include('admin.components.toast')

    <!-- Scripts -->
    <script>
        // Dark Mode Toggle Logic
        const html = document.documentElement;
        const toggleTheme = () => {
            html.classList.toggle('dark');
            localStorage.setItem('admin-theme', html.classList.contains('dark') ? 'dark' : 'light');
        };

        // Initialize Theme
        if (localStorage.getItem('admin-theme') === 'dark' || (!localStorage.getItem('admin-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    </script>
    @stack('scripts')
</body>
</html>
