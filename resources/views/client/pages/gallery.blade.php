@extends('client.layouts.app')

@section('title', 'Gallery | thanhnguyenduyy')
@section('description', 'Photography portfolio - Street, Portrait, Travel, Minimal')

@section('content')
<!-- Gallery Page -->
<section class="page page-gallery active" id="page-gallery">
    <div class="container">
        <!-- Gallery Header -->
        <div class="gallery-header">
            <h2 class="gallery-title font-serif">Photography</h2>
            <div class="gallery-filters">
                <button class="gallery-filter active" data-filter="ALL">ALL</button>
                <button class="gallery-filter" data-filter="STREET">STREET</button>
                <button class="gallery-filter" data-filter="PORTRAIT">PORTRAIT</button>
                <button class="gallery-filter" data-filter="TRAVEL">TRAVEL</button>
                <button class="gallery-filter" data-filter="MINIMAL">MINIMAL</button>
            </div>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            <!-- Gallery photos will be inserted by JavaScript -->
        </div>
    </div>
</section>

@push('scripts')
<script>
    @php
        $mappedPhotos = $photos->map(function($photo) {
            return [
                'id' => $photo->id,
                'url' => $photo->url,
                'title' => $photo->title,
                'category' => $photo->category,
                'exif' => $photo->exif
            ];
        });
    @endphp
    const PHOTOS = @json($mappedPhotos);
</script>
@endpush
@endsection

