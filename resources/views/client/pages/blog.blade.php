@extends('client.layouts.app')

@section('title', 'Blog | ' . $settings['site_name'])
@section('description', 'Thoughts on bits, bytes, and bokeh')

@section('content')
<!-- Blog Page -->
<section class="page page-blog active" id="page-blog">
    <div class="container">
        <!-- Journal Header -->
        <div class="blog-header">
            <div>
                <h1 class="blog-title font-serif">Journal</h1>
                <p class="blog-subtitle">Thoughts on bits, bytes, and bokeh.</p>
            </div>

            <!-- Blog Filter Tabs -->
            <div class="blog-filters">
                <button class="blog-filter active" data-filter="ALL">ALL</button>
                <button class="blog-filter" data-filter="IT">IT</button>
                <button class="blog-filter" data-filter="PHOTOGRAPHY">PHOTOGRAPHY</button>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid" id="blogGrid">
            <!-- Blog posts will be inserted by JavaScript -->
        </div>
    </div>
</section>

@push('scripts')
<script>
    @php
        $mappedPosts = $posts->map(function($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'date' => $post->published_at ? $post->published_at->format('M d, Y') : '',
                'excerpt' => $post->excerpt,
                'category' => $post->category,
                'slug' => $post->slug,
                'image' => $post->image_url,
                'tags' => []
            ];
        });
    @endphp
    const BLOG_POSTS = @json($mappedPosts);
</script>
@endpush
@endsection

