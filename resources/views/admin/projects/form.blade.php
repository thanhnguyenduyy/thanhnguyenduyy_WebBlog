@extends('layouts.admin', ['currentView' => isset($project) ? 'Edit Project' : 'New Project'])

@section('content')
<div class="animate-in max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-serif text-zinc-900 dark:text-white">{{ isset($project) ? 'Edit Project' : 'New Project' }}</h2>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Cancel</a>
    </div>

    <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-8 rounded-xl shadow-sm dark:shadow-none">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Project Title</label>
                <input 
                    type="text" 
                    name="title"
                    id="project-title"
                    value="{{ old('title', $project->title ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="Aperture Engine..."
                    onkeyup="updateSlug(this.value, 'project-slug')"
                    required
                />
            </div>
            <!-- Slug -->
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Slug</label>
                <input 
                    type="text" 
                    name="slug"
                    id="project-slug"
                    value="{{ old('slug', $project->slug ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="url-slug-here"
                />
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Description</label>
            <textarea 
                name="description"
                rows="4"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none resize-none transition-colors"
                placeholder="Describe your project..."
            >{{ old('description', $project->description ?? '') }}</textarea>
        </div>

        <!-- Tech Stack -->
        <div>
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Tech Stack (Type and press Enter)</label>
            <div class="flex flex-wrap gap-2 mb-2" id="tech_stack_container">
                <!-- Tags will be rendered here -->
            </div>
            <input 
                type="text" 
                id="tech_input"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                placeholder="React, Go, WebAssembly..."
                onkeydown="handleTechInput(event)"
            />
            <div id="hidden_tags"></div>
        </div>

        <!-- Status & featured -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Status</label>
                <select 
                    name="status"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none"
                >
                    <option value="Completed" {{ old('status', $project->status ?? '') === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="In Progress" {{ old('status', $project->status ?? '') === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Archived" {{ old('status', $project->status ?? '') === 'Archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>
            <div class="flex items-center space-x-4 pt-6">
                <input 
                    type="checkbox" 
                    name="is_featured"
                    id="is_featured"
                    value="1"
                    {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 text-brand-blue bg-zinc-100 border-zinc-300 rounded focus:ring-brand-blue dark:focus:ring-brand-blue dark:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-700 dark:border-zinc-600"
                />
                <label for="is_featured" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Featured Project</label>
            </div>
        </div>

        <!-- Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Project Preview URL</label>
                <input 
                    type="url" 
                    name="link"
                    value="{{ old('link', $project->link ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="https://example.com"
                />
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">GitHub Repository URL</label>
                <input 
                    type="url" 
                    name="github_link"
                    value="{{ old('github_link', $project->github_link ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="https://github.com/..."
                />
            </div>
        </div>

        <!-- Image Upload -->
        <div>
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Project Cover Image</label>
            <div class="flex items-center space-x-6">
                <div class="flex-shrink-0">
                    @if(isset($project) && $project->image_url)
                        <img src="{{ Str::startsWith($project->image_url, 'http') ? $project->image_url : $project->image_url }}" alt="Preview" class="h-24 w-40 object-cover rounded-lg border border-zinc-200 dark:border-zinc-800">
                    @else
                        <div class="h-24 w-40 rounded-lg border-2 border-dashed border-zinc-200 dark:border-zinc-800 flex items-center justify-center text-zinc-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <input 
                        type="file" 
                        name="image"
                        class="block w-full text-sm text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-zinc-900 dark:file:bg-zinc-100 file:text-white dark:file:text-black hover:file:bg-zinc-700 dark:hover:file:bg-zinc-200 file:transition-colors"
                    />
                    <p class="mt-2 text-xs text-zinc-400">PNG, JPG or WebP up to 2MB. Leave empty to keep current image or use Image URL below.</p>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Or External Image URL</label>
                <input 
                    type="text" 
                    name="image_url"
                    value="{{ old('image_url', $project->image_url ?? '') }}"
                    class="w-full bg-transparent border-b border-zinc-200 dark:border-zinc-800 py-2 text-sm text-zinc-600 dark:text-zinc-400 focus:outline-none focus:border-brand-blue"
                    placeholder="https://..."
                />
            </div>
        </div>
        
        <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 flex justify-end">
            <button 
                type="submit"
                class="bg-brand-blue text-white dark:text-black font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 dark:hover:bg-blue-400 transition-colors shadow-lg shadow-blue-500/20"
            >
                Save Project
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/admin/js/admin-utils.js') }}"></script>
<script src="{{ asset('assets/admin/js/project-form.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        initProjectForm(@json(old('tech_stack', $project->tech_stack ?? [])));
    });
</script>
@endpush

