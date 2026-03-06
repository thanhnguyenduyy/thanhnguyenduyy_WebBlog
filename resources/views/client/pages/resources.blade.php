@extends('client.layouts.app')

@section('title', 'Resources | ' . $settings['site_name'])
@section('description', 'Chia sẻ miễn phí những công cụ giúp bạn học tập và sáng tạo nhanh hơn')

@section('content')
<!-- Resources Page -->
<section class="page page-resources active" id="page-resources">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title font-serif">Resources</h2>
            <div class="section-line"></div>
            <p class="section-subtitle font-serif italic">"Chia sẻ miễn phí những công cụ giúp bạn học tập và
                sáng tạo nhanh hơn."</p>
        </div>
        <div class="resources-grid">
            @foreach($resources as $resource)
            <a href="{{ $resource->url }}" target="_blank" class="resource-card">
                <div class="resource-card-main">
                    <div class="resource-card-icon">
                        @if($resource->type === 'PRESET')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                        @elseif($resource->type === 'CODE')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        @elseif($resource->type === 'PDF')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        @endif
                    </div>
                    <div>
                        <h3 class="resource-card-title">{{ $resource->title }}</h3>
                        <p class="resource-card-items">{{ $resource->description }}</p>
                    </div>
                </div>
                <div class="resource-card-download">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </div>
            </a>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $resources->links('client.partials.pagination') }}
        </div>
    </div>
</section>

