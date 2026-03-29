@extends('client.layouts.app')

@section('title', $post->title . ' | ' . $settings['site_name'])
@section('description', $post->excerpt)

@section('content')
<!-- Blog Detail Page -->
<section class="page page-blog-detail active" id="page-blog-detail">
    <div class="container container-narrow">
        <!-- Back to Blog Link -->
        <a href="{{ route('client.blog') }}" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            BACK TO JOURNAL
        </a>

        <!-- Blog Post Header -->
        <header class="post-header">
            <div class="post-meta">
                <span class="post-category">{{ $post->category }}</span>
                <span class="post-date">{{ $post->published_at->format('M d, Y') }}</span>
                @if($post->reading_time)
                <span class="post-reading-time">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    {{ $post->reading_time }} min read
                </span>
                @endif
                <span class="post-views">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    {{ number_format($post->views_count) }} views
                </span>
            </div>
            <h1 class="post-title font-serif">{{ $post->title }}</h1>
            @if($post->excerpt)
                <p class="post-excerpt">{{ $post->excerpt }}</p>
            @endif
        </header>

        <!-- Featured Image -->
        @if($post->image_url)
            <div class="post-featured-image">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
            </div>
        @endif

        <!-- Blog Content -->
        <article class="post-content glass">
            <div class="article-body">
                {!! $post->content !!}
            </div>
        </article>

        <!-- Post Footer -->
        <footer class="post-footer">
            <div class="post-share">
                <span class="share-label">SHARE</span>
                <div class="share-links">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer">Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer">Twitter</a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                </div>
            </div>
        </footer>

        <!-- Related Posts Section -->
        @if($relatedPosts->count() > 0)
        <section class="related-posts">
            <h2 class="related-title font-serif">Continue Reading</h2>
            <div class="related-grid">
                @foreach($relatedPosts as $relPost)
                <a href="{{ route('client.blog.detail', $relPost->slug) }}" class="related-card">
                    <div class="related-image">
                        <img src="{{ $relPost->image_url }}" alt="{{ $relPost->title }}">
                    </div>
                    <div class="related-content">
                        <span class="related-date">{{ $relPost->published_at->format('M d, Y') }}</span>
                        <h3 class="related-post-title">{{ $relPost->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .page-blog-detail {
        padding: 10rem 0 6rem;
    }

    .container-narrow {
        max-width: 800px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.625rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        color: var(--color-text-muted);
        margin-bottom: 3rem;
        transition: color var(--transition-normal);
    }

    .back-link:hover {
        color: var(--color-cyan);
    }

    .post-header {
        margin-bottom: 3rem;
    }

    .post-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .post-category {
        font-size: 0.625rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        color: var(--color-cyan);
        text-transform: uppercase;
    }

    .post-date, .post-views, .post-reading-time {
        font-size: 0.625rem;
        font-family: var(--font-mono);
        color: var(--color-text-dark);
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .post-title {
        font-size: 3rem;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        color: var(--color-white);
    }

    @media (min-width: 768px) {
        .post-title {
            font-size: 4rem;
        }
    }

    .post-excerpt {
        font-size: 1.25rem;
        color: var(--color-text-muted);
        font-weight: 300;
        line-height: 1.6;
        border-left: 3px solid var(--color-cyan);
        padding-left: 1.5rem;
    }

    .post-featured-image {
        margin-bottom: 4rem;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .post-featured-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .post-content {
        padding: 4rem 3rem;
        border-radius: 4px;
        line-height: 1.8;
        font-size: 1.125rem;
        color: var(--color-text);
        margin-bottom: 4rem;
    }

    .article-body p {
        margin-bottom: 2rem;
    }

    .article-body h2, .article-body h3 {
        color: var(--color-white);
        margin: 3rem 0 1.5rem;
        font-family: var(--font-serif);
        font-style: italic;
    }

    .article-body h2 { font-size: 2.25rem; }
    .article-body h3 { font-size: 1.75rem; }

    .article-body img {
        border-radius: 4px;
        margin: 2.5rem 0;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .article-body blockquote {
        margin: 2.5rem 0;
        padding: 2rem;
        border-left: 4px solid var(--color-cyan);
        background: rgba(34, 211, 238, 0.05);
        font-style: italic;
        font-size: 1.25rem;
        color: var(--color-white);
    }

    .post-footer {
        border-top: 1px solid var(--color-border);
        padding-top: 3rem;
        margin-bottom: 8rem;
    }

    .post-share {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .share-label {
        font-size: 0.625rem;
        font-weight: 900;
        letter-spacing: 0.4em;
        color: var(--color-text-dark);
    }

    .share-links {
        display: flex;
        gap: 1.5rem;
    }

    .share-links a {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--color-text-muted);
        transition: color var(--transition-normal);
    }

    .share-links a:hover {
        color: var(--color-cyan);
    }

    /* Related Posts */
    .related-posts {
        margin-bottom: 8rem;
    }

    .related-title {
        font-size: 2.5rem;
        color: var(--color-white);
        margin-bottom: 3rem;
        font-style: italic;
    }

    .related-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .related-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .related-card {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        transition: transform var(--transition-normal);
    }

    .related-card:hover {
        transform: translateY(-5px);
    }

    .related-image {
        aspect-ratio: 16/9;
        overflow: hidden;
        border-radius: 2px;
    }

    .related-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.8;
        transition: opacity var(--transition-normal);
    }

    .related-card:hover .related-image img {
        opacity: 1;
    }

    .related-date {
        font-size: 0.625rem;
        font-family: var(--font-mono);
        color: var(--color-text-dark);
    }

    .related-post-title {
        font-size: 1.125rem;
        font-family: var(--font-serif);
        font-style: italic;
        color: var(--color-white);
        margin-top: 0.5rem;
        line-height: 1.4;
    }

    /* Light mode adjustments */
    [data-theme="light"] .post-content {
        background: rgba(255, 255, 255, 0.8);
    }
</style>
@endpush
