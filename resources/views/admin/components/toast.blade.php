<!-- Global Toast Component -->
<div id="admin-toast-container" class="fixed bottom-10 right-10 z-[100] pointer-events-none">
    @if(session('success'))
    <div id="toast-success" class="pointer-events-auto bg-zinc-900 dark:bg-zinc-800 text-white p-4 rounded-2xl shadow-2xl dark:shadow-none flex items-center min-w-[340px] animate-in slide-in-from-right duration-500 border-l-4 border-green-500 dark:border dark:border-zinc-700 dark:border-l-green-500">
        <div class="flex-shrink-0 w-10 h-10 bg-green-500/20 text-green-400 rounded-full flex items-center justify-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        </div>
        <div class="flex-1 pr-4">
            <p class="text-[10px] font-black text-green-500 uppercase tracking-[0.2em] leading-none mb-1">Success</p>
            <p class="text-sm font-medium text-zinc-100">{{ session('success') }}</p>
        </div>
        <button onclick="dismissGlobalToast('toast-success')" class="text-zinc-500 hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div id="toast-error" class="pointer-events-auto bg-zinc-900 dark:bg-zinc-800 text-white p-4 rounded-2xl shadow-2xl dark:shadow-none flex items-center min-w-[340px] animate-in slide-in-from-right duration-500 border-l-4 border-red-500 dark:border dark:border-zinc-700 dark:border-l-red-500">
        <div class="flex-shrink-0 w-10 h-10 bg-red-500/20 text-red-400 rounded-full flex items-center justify-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
        <div class="flex-1 pr-4">
            <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.2em] leading-none mb-1">Error</p>
            <p class="text-sm font-medium text-zinc-100">{{ session('error') }}</p>
        </div>
        <button onclick="dismissGlobalToast('toast-error')" class="text-zinc-500 hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    @endif
</div>

<script>
    function dismissGlobalToast(id) {
        const toast = document.getElementById(id);
        if (toast) {
            toast.classList.add('opacity-0', 'translate-x-10', 'scale-95');
            toast.classList.replace('duration-500', 'duration-300');
            setTimeout(() => toast.remove(), 300);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        ['toast-success', 'toast-error'].forEach(id => {
            const toast = document.getElementById(id);
            if (toast) {
                setTimeout(() => dismissGlobalToast(id), 5000);
            }
        });
    });
</script>
