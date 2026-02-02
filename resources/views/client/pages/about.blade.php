@extends('client.layouts.app')

@section('title', 'About | thanhnguyenduyy')
@section('description', 'Câu chuyện của Nguyễn Duy Thanh - Developer và Photographer')

@section('content')
<!-- About Page -->
<section class="page page-about active" id="page-about">
    <div class="container">
        <!-- Header section -->
        <div class="about-header">
            <div class="about-profile">
                <div class="about-profile-wrapper">
                    <div class="about-profile-glow"></div>
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=300"
                        class="about-profile-image" alt="Nguyen Minh Quân Profile">
                </div>
            </div>
            <div class="about-intro">
                <h2 class="section-title font-serif">My Story</h2>
                <div class="about-quote-wrapper">
                    <div class="about-line"></div>
                    <p class="about-quote font-serif italic">
                        "I build digital foundations and capture fleeting moments. One requires precision, the
                        other requires patience."
                    </p>
                </div>
            </div>
        </div>

        <!-- 01. THE TECHNOLOGIST -->
        <div class="about-section about-section-tech">
            <div class="about-section-content">
                <h3 class="about-section-label">
                    <span class="label-line"></span> 01. THE TECHNOLOGIST
                </h3>
                <p class="about-section-text">
                    My journey in IT started with a fascination for how things work under the hood. From my
                    first "Hello World" to architecting high-traffic web platforms, I've always been driven by
                    the elegance of well-structured systems. I specialize in Fullstack development, Cloud
                    Infrastructure, and UI/UX design.
                </p>
            </div>

            <div class="stack-card">
                <div class="stack-card-accent"></div>
                <h4 class="stack-card-title">STACK ARCHITECTURE</h4>
                <div class="stack-tags">
                    <span class="stack-tag">TYPESCRIPT</span>
                    <span class="stack-tag">REACT</span>
                    <span class="stack-tag">NODE.JS</span>
                    <span class="stack-tag">GO</span>
                    <span class="stack-tag">AWS</span>
                    <span class="stack-tag">DOCKER</span>
                    <span class="stack-tag">FIGMA</span>
                    <span class="stack-tag">NEXT.JS</span>
                    <span class="stack-tag">POSTGRES</span>
                </div>
            </div>
        </div>

        <!-- 02. THE OBSERVER -->
        <div class="about-section about-section-observer">
            <div class="about-observer-image">
                <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&q=80&w=1000"
                    alt="Photography Workspace">
            </div>
            <div class="about-section-content">
                <h3 class="about-section-label">
                    <span class="label-line"></span> 02. THE OBSERVER
                </h3>
                <p class="about-section-text">
                    Photography is my way of slowing down. In a world of fast-paced releases, the lens forces me
                    to wait for the light. My work focuses on Street Minimalism, seeking order and poetic
                    geometry in urban chaos.
                </p>
            </div>
        </div>

        <!-- 03. PROFESSIONAL MILESTONES -->
        <div class="about-milestones">
            <h3 class="about-section-label milestones-label">
                <span class="label-line"></span> 03. PROFESSIONAL MILESTONES
            </h3>

            <div class="timeline">
                @foreach($timeline as $item)
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">{{ $item->year }}</div>
                        <div class="timeline-col">
                            <span class="timeline-title">{{ $item->title }}</span>
                            <p class="timeline-desc">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
