<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu | {{ $settings['site_name'] ?? 'minhnhat_dev' }}</title>
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
            <div class="text-center mt-4">
                <h2 class="text-2xl font-semibold text-slate-800 tracking-tight">Quên mật khẩu?</h2>
                <p class="text-slate-500 text-sm mt-1">Nhập email của bạn để nhận link đặt lại mật khẩu</p>
            </div>
        </div>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="space-y-1">
                <label class="text-xs font-medium text-slate-500 uppercase tracking-wider ml-1">Email</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="block w-full pl-10 pr-3 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-sm @error('email') border-red-500 @enderror"
                        placeholder="admin@example.com"
                        required
                    />
                </div>
                @error('email')
                    <p class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                id="submit-btn"
                class="w-full flex items-center justify-center py-3.5 px-4 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-medium shadow-lg shadow-slate-900/20 transition-all duration-200 mt-2 group"
            >
                <span id="btn-text">Gửi link đặt lại mật khẩu</span>
                <div id="loader" class="hidden w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
            </button>
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors">Quay lại đăng nhập</a>
            </div>
        </form>
    </div>
    
    <div class="absolute bottom-4 text-center w-full z-10">
        <p class="text-xs text-slate-400 font-medium tracking-wide opacity-60 uppercase">
            © {{ date('Y') }} {{ $settings['site_name'] }} • Keep it simple.
        </p>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('btn-text').classList.add('hidden');
            document.getElementById('loader').classList.remove('hidden');
            document.getElementById('submit-btn').disabled = true;
            document.getElementById('submit-btn').style.opacity = '0.7';
        });
    </script>
</body>
</html>
