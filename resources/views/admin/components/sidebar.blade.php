<div class="w-64 h-full bg-white dark:bg-brand-panel border-r border-zinc-200 dark:border-brand-border flex flex-col flex-shrink-0 relative z-20 transition-colors duration-300">
    <div class="p-6 flex items-center space-x-3 border-b border-zinc-200 dark:border-brand-border/50">
        <div class="w-8 h-8 bg-brand-blue rounded flex items-center justify-center text-black font-bold font-serif text-lg shadow-[0_0_15px_rgba(0,163,255,0.3)]">
            T
        </div>
        <div>
            <h1 class="font-bold text-zinc-900 dark:text-white tracking-wide text-sm font-serif">thanhnguyenduyy</h1>
            <p class="text-[10px] text-zinc-500 uppercase tracking-widest">Admin Console</p>
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest px-3 mb-2">Main Menu</div>
        @php
            $navItems = [
                ['id' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'layout-dashboard', 'route' => 'admin.dashboard'],
                ['id' => 'profile', 'label' => 'Profile & Story', 'icon' => 'user', 'route' => 'admin.profile'],
                ['id' => 'blog', 'label' => 'Journal', 'icon' => 'book-open', 'route' => 'admin.blog.index'],
                ['id' => 'gallery', 'label' => 'Photography', 'icon' => 'camera', 'route' => 'admin.gallery.index'],
                ['id' => 'projects', 'label' => 'IT Projects', 'icon' => 'briefcase', 'route' => 'admin.projects.index'],
                ['id' => 'resources', 'label' => 'Resources', 'icon' => 'download', 'route' => 'admin.resources.index'],
                ['id' => 'contact', 'label' => 'Inbox', 'icon' => 'mail', 'route' => 'admin.inbox.index'],
            ];
            $currentView = $currentViewId ?? 'dashboard';
        @endphp

        @foreach($navItems as $item)
            @php $isActive = $currentView === $item['id']; @endphp
            <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
               class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-lg transition-all duration-200 group {{ $isActive ? 'bg-brand-blue/10 text-brand-blue' : 'text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800/50 hover:text-zinc-900 dark:hover:text-white' }}">
                <div class="{{ $isActive ? 'text-brand-blue' : 'text-zinc-400 dark:text-zinc-500 group-hover:text-zinc-900 dark:group-hover:text-white' }}">
                    @switch($item['icon'])
                        @case('layout-dashboard')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
                        @break
                        @case('user')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        @break
                        @case('book-open')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a4 4 0 0 0-4-4H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a4 4 0 0 1 4-4h6z"></path></svg>
                        @break
                        @case('camera')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                        @break
                        @case('briefcase')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        @break
                        @case('download')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        @break
                        @case('mail')
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        @break
                    @endswitch
                </div>
                <span class="text-sm font-medium {{ $isActive ? 'font-semibold' : '' }}">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="p-4 border-t border-zinc-200 dark:border-brand-border/50 bg-white dark:bg-brand-panel">
        <button onclick="toggleTheme()" class="w-full flex items-center space-x-3 px-3 py-2 mb-1 text-zinc-500 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-800/50 rounded-lg transition-colors">
            <span class="dark:hidden flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                <span class="text-sm">Dark Mode</span>
            </span>
            <span class="hidden dark:flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                <span class="text-sm">Light Mode</span>
            </span>
        </button>

        <a href="{{ Route::has('admin.settings') ? route('admin.settings') : '#' }}"
           class="w-full flex items-center space-x-3 px-3 py-2 mb-1 transition-colors rounded-lg {{ ($currentViewId ?? '') === 'settings' ? 'bg-zinc-100 dark:bg-zinc-800 text-zinc-900 dark:text-white' : 'text-zinc-500 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-800/50' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span class="text-sm">Settings</span>
        </a>
        <form action="{{ Route::has('logout') ? route('logout') : '#' }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center space-x-3 px-3 py-2 text-red-500 dark:text-red-400 hover:text-red-600 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/10 rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span class="text-sm">Logout</span>
            </button>
        </form>
    </div>
</div>
