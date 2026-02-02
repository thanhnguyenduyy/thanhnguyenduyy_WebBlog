@extends('client.layouts.app')

@section('title', 'Resources | thanhnguyenduyy')
@section('description', 'Chia sẻ miễn phí những công cụ giúp bạn học tập và sáng tạo nhanh hơn')

@section('content')
<!-- Resources Page -->
<section class="page page-resources active" id="page-resources">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title font-serif">Tài Nguyên</h2>
            <div class="section-line"></div>
            <p class="section-subtitle font-serif italic">"Chia sẻ miễn phí những công cụ giúp bạn học tập và
                sáng tạo nhanh hơn."</p>
        </div>
        <div class="resources-grid" id="resourcesGrid">
            <!-- Resources will be inserted by JavaScript -->
        </div>
    </div>
</section>

@push('scripts')
<script>
    @php
        $iconMap = [
            'PRESET' => 'camera',
            'CODE' => 'terminal',
            'PDF' => 'book'
        ];
        $mappedResources = $resources->map(function($res) use ($iconMap) {
            return [
                'title' => $res->title,
                'items' => $res->description,
                'icon' => $iconMap[$res->type] ?? 'layout'
            ];
        });
    @endphp
    const RESOURCES = @json($mappedResources);
</script>
@endpush
@endsection

