@extends('client.layouts.app')

@section('title', 'About | ' . $settings['site_name'])
@section('description', $settings['site_description'])

@section('content')
<!-- About Page -->
<section class="page page-about active" id="page-about">
    <div class="container">
        <!-- Header section -->
        <div class="about-header">
            <div class="about-profile">
                <div class="about-profile-wrapper">
                    <div class="about-profile-glow"></div>
                    <img src="{{ $settings['site_avatar'] }}"
                        class="about-profile-image" alt="{{ $settings['display_name'] }} Profile">
                </div>
            </div>
            <div class="about-intro">
                <h2 class="section-title font-serif">My Story</h2>
                <div class="about-quote-wrapper">
                    <div class="about-line"></div>
                    <p class="about-quote font-serif italic">
                        {{ $settings['about_quote'] }}
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
                    {{ $settings['technologist_bio'] }}
                </p>
            </div>

            <div class="stack-card">
                <div class="stack-card-accent"></div>
                <h4 class="stack-card-title">STACK ARCHITECTURE</h4>
                <div class="stack-tags">
                    @foreach(explode(',', $settings['tech_stack'] ?? '') as $tag)
                        <span class="stack-tag">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- 02. THE OBSERVER -->
        <div class="about-section about-section-observer">
            <div class="about-observer-image">
                <img src="/assets/images/web/workspace.jpg"
                    alt="Photography Workspace">
            </div>
            <div class="about-section-content">
                <h3 class="about-section-label">
                    <span class="label-line"></span> 02. THE OBSERVER
                </h3>
                <p class="about-section-text">
                    {{ $settings['observer_bio'] }}
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
