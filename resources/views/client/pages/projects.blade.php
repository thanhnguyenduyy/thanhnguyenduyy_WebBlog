@extends('client.layouts.app')

@section('title', 'Projects | thanhnguyenduyy')
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
            <!-- Projects will be inserted by JavaScript -->
        </div>
    </div>
</section>

@push('scripts')
<script>
    @php
        $mappedProjects = $projects->map(function($project) {
            return [
                'id' => $project->id,
                'name' => $project->title,
                'tech' => $project->tech_stack,
                'desc' => $project->description,
                'image' => $project->image_url
            ];
        });
    @endphp
    const PROJECTS = @json($mappedProjects);
</script>
@endpush
@endsection

