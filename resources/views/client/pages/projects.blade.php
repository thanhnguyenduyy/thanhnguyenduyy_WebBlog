@extends('client.layouts.app')

@section('title', 'Projects | ' . $settings['site_name'])
@section('description', 'Showcasing digital products built with logic and precision')

@section('content')
<!-- Projects Page -->
<section class="page page-projects active" id="page-projects">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title font-serif">IT Projects</h2>
            <div class="section-line"></div>
            <p class="section-subtitle font-serif italic">"Showcasing digital products built with logic and
                precision."</p>
        </div>
        <div class="projects-grid" id="projectsGrid">
            @foreach($projects as $project)
            <div class="project-card {{ $project->is_featured ? 'featured' : '' }}">
                <a href="{{ $project->link ?? '#' }}" target="_blank" class="project-card-image">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                    <div class="project-card-image-overlay"></div>
                    @if($project->is_featured)
                        <div class="project-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            Featured
                        </div>
                    @endif
                </a>
                <div class="project-card-content">
                    <div class="project-card-header">
                        <h3 class="project-card-title">{{ $project->title }}</h3>
                        <a href="{{ $project->link ?? '#' }}" target="_blank" class="project-card-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>
                        </a>
                    </div>
                    <p class="project-card-desc">{{ $project->description }}</p>
                    <div class="project-card-tech">
                        @if($project->tech_stack)
                            @foreach($project->tech_stack as $tech)
                                <span class="project-tech-tag">{{ trim($tech) }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $projects->links('client.partials.pagination') }}
        </div>
    </div>
</section>
@endsection

