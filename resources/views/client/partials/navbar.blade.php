<!-- Navbar -->
<nav class="navbar glass" id="navbar">
    <div class="navbar-container">
        <a href="{{ route('client.home') }}" class="logo" id="logo">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="4 17 10 11 4 5"></polyline>
                    <line x1="12" y1="19" x2="20" y2="19"></line>
                </svg>
            </div>
            <span class="logo-text">thanhnguyenduyy</span>
        </a>

        <!-- Desktop Menu -->
        <div class="nav-menu" id="navMenu">
            <a href="{{ route('client.home') }}" class="nav-item {{ request()->routeIs('client.home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('client.about') }}" class="nav-item {{ request()->routeIs('client.about') ? 'active' : '' }}">About</a>
            <a href="{{ route('client.blog') }}" class="nav-item {{ request()->routeIs('client.blog') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('client.gallery') }}" class="nav-item {{ request()->routeIs('client.gallery') ? 'active' : '' }}">Gallery</a>
            <a href="{{ route('client.projects') }}" class="nav-item {{ request()->routeIs('client.projects') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('client.resources') }}" class="nav-item {{ request()->routeIs('client.resources') ? 'active' : '' }}">Resources</a>
            <a href="{{ route('client.now') }}" class="nav-item {{ request()->routeIs('client.now') ? 'active' : '' }}">Now</a>
            <a href="{{ route('client.contact') }}" class="nav-item {{ request()->routeIs('client.contact') ? 'active' : '' }}">Contact</a>
            
            <!-- Theme Toggle -->
            <button class="theme-toggle" id="themeToggle" title="Toggle dark/light mode">
                <svg class="theme-icon-sun" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
                <svg class="theme-icon-moon" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Toggle -->
        <button class="mobile-toggle" id="mobileToggle">
            <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
            <svg class="close-icon hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden" id="mobileMenu">
        <a href="{{ route('client.home') }}" class="mobile-nav-item {{ request()->routeIs('client.home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('client.about') }}" class="mobile-nav-item {{ request()->routeIs('client.about') ? 'active' : '' }}">About</a>
        <a href="{{ route('client.blog') }}" class="mobile-nav-item {{ request()->routeIs('client.blog') ? 'active' : '' }}">Blog</a>
        <a href="{{ route('client.gallery') }}" class="mobile-nav-item {{ request()->routeIs('client.gallery') ? 'active' : '' }}">Gallery</a>
        <a href="{{ route('client.projects') }}" class="mobile-nav-item {{ request()->routeIs('client.projects') ? 'active' : '' }}">Projects</a>
        <a href="{{ route('client.resources') }}" class="mobile-nav-item {{ request()->routeIs('client.resources') ? 'active' : '' }}">Resources</a>
        <a href="{{ route('client.now') }}" class="mobile-nav-item {{ request()->routeIs('client.now') ? 'active' : '' }}">Now</a>
        <a href="{{ route('client.contact') }}" class="mobile-nav-item {{ request()->routeIs('client.contact') ? 'active' : '' }}">Contact</a>
        
        <!-- Mobile Theme Toggle -->
        <button class="mobile-theme-toggle" id="mobileThemeToggle">
            <span class="theme-toggle-label">
                <svg class="theme-icon-sun" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
                <svg class="theme-icon-moon" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
                <span class="theme-text-light">Light Mode</span>
                <span class="theme-text-dark">Dark Mode</span>
            </span>
        </button>
    </div>
</nav>
