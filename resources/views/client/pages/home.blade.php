@extends('client.layouts.app')

@section('title', 'Home | thanhnguyenduyy')

@section('content')
<!-- Home Page -->
<section class="page page-home active" id="page-home">
    <div class="home-container">
        <div class="profile-wrapper">
            <div class="profile-glow"></div>
            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=500"
                class="profile-image" alt="Profile">
        </div>
        <h1 class="home-title font-serif">Nguyễn Duy Thanh</h1>
        <p class="home-subtitle">
            Xây dựng thế giới qua <span class="text-cyan">code</span>. Lưu giữ khoảnh khắc qua <span
                class="text-white font-serif italic">ống kính</span>.
        </p>
        <div class="home-buttons">
            <a href="{{ route('client.projects') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="16 18 22 12 16 6"></polyline>
                    <polyline points="8 6 2 12 8 18"></polyline>
                </svg>
                View Projects
            </a>
            <a href="{{ route('client.gallery') }}" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                    </path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                Photography
            </a>
        </div>
    </div>
</section>
@endsection
