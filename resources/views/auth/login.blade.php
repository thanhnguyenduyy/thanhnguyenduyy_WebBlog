<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | {{ $settings['site_name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .backdrop-blur-xl { backdrop-filter: blur(24px); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 p-4 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-100/50 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-100/50 rounded-full blur-3xl opacity-60"></div>
    </div>

    <div class="w-full max-w-md bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/50 p-8 relative z-10 transition-all duration-500 ease-out transform translate-y-0 opacity-100">
        <div class="flex flex-col items-center mb-8">
            <div class="relative group">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-lg relative z-10">
                    <img
                        src="{{ (isset($settings['site_avatar']) && str_starts_with($settings['site_avatar'], '/')) ? asset($settings['site_avatar']) : asset('storage/' . ($settings['site_avatar'] ?? '')) }}"
                        alt="Admin Avatar"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    />
                </div>
                <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-500 blur-md opacity-40 group-hover:opacity-60 transition-opacity duration-300 -z-10 scale-110"></div>
            </div>
            
            <div class="text-center mt-4">
                <h2 class="text-2xl font-semibold text-slate-800 tracking-tight">Chào mừng trở lại</h2>
                <p class="text-slate-500 text-sm mt-1">Đăng nhập để quản lý blog của bạn</p>
            </div>
        </div>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="space-y-1">
                <label class="text-xs font-medium text-slate-500 uppercase tracking-wider ml-1">Email</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $rememberedEmail ?? '') }}"
                        class="block w-full pl-10 pr-3 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-sm @error('email') border-red-500 @enderror"
                        placeholder="admin@example.com"
                        autocomplete="email"
                        required
                    />
                </div>
                @error('email')
                    <p class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <div class="flex justify-between items-center ml-1">
                    <label class="text-xs font-medium text-slate-500 uppercase tracking-wider">Mật khẩu</label>
                    <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium transition-colors">Quên mật khẩu?</a>
                </div>
                <div class="relative group" x-data="{ show: false }">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="block w-full pl-10 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-sm"
                        placeholder="••••••••"
                        required
                    />
                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-none"
                    >
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center ml-1">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <label for="remember" class="ml-2 text-sm text-slate-500">Ghi nhớ đăng nhập</label>
            </div>

            <button
                type="submit"
                id="submit-btn"
                class="w-full flex items-center justify-center py-3.5 px-4 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-medium shadow-lg shadow-slate-900/20 transition-all duration-200 mt-2 group"
            >
                <span id="btn-text">Đăng nhập</span>
                <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 opacity-70 group-hover:translate-x-1 transition-transform"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                <div id="loader" class="hidden w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
            </button>
        </form>
    </div>
    
    <div class="absolute bottom-4 text-center w-full z-10">
        <p class="text-xs text-slate-400 font-medium tracking-wide opacity-60 uppercase">
            © {{ date('Y') }} {{ $settings['site_name'] }} • Keep it simple.
        </p>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
            }
        }

        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('btn-text').classList.add('hidden');
            document.getElementById('arrow-icon').classList.add('hidden');
            document.getElementById('loader').classList.remove('hidden');
            document.getElementById('submit-btn').disabled = true;
            document.getElementById('submit-btn').style.opacity = '0.7';
        });
    </script>
</body>
</html>
