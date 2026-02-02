@extends('layouts.admin', ['currentView' => isset($project) ? 'Edit Project' : 'New Project'])

@section('content')
<div class="animate-in max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-serif text-zinc-900 dark:text-white">{{ isset($project) ? 'Edit Project' : 'New Project' }}</h2>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Cancel</a>
    </div>

    <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" class="space-y-6 bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-8 rounded-xl shadow-sm dark:shadow-none">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Project Title</label>
            <input 
                type="text" 
                name="title"
                value="{{ old('title', $project->title ?? '') }}"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                placeholder="Aperture Engine..."
                required
            />
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
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Tech Stack (Comma separated)</label>
            <input 
                type="text" 
                id="tech_stack_input"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                placeholder="React, Go, WebAssembly..."
                value="{{ old('tech_stack') ? implode(', ', old('tech_stack')) : (isset($project) && $project->tech_stack ? implode(', ', $project->tech_stack) : '') }}"
            />
            <div id="tech_stack_container"></div>
            <!-- Actual hidden input for Laravel validation as array -->
            <div id="hidden_tags"></div>
        </div>

        <!-- Links -->
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Project URL</label>
                <input 
                    type="url" 
                    name="link"
                    value="{{ old('link', $project->link ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="https://example.com"
                />
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Image URL</label>
                <input 
                    type="url" 
                    name="image_url"
                    value="{{ old('image_url', $project->image_url ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="https://picsum.photos/..."
                />
            </div>
        </div>
        
        <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 flex justify-end">
            <button 
                type="submit"
                class="bg-brand-blue text-white dark:text-black font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 dark:hover:bg-blue-400 transition-colors"
            >
                Save Project
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const techInput = document.getElementById('tech_stack_input');
    const hiddenContainer = document.getElementById('hidden_tags');

    function updateHiddenInputs() {
        const value = techInput.value;
        const tags = value.split(',').map(t => t.trim()).filter(t => t !== '');
        
        hiddenContainer.innerHTML = '';
        tags.forEach(tag => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'tech_stack[]';
            input.value = tag;
            hiddenContainer.appendChild(input);
        });
    }

    techInput.addEventListener('input', updateHiddenInputs);
    // Initial update
    updateHiddenInputs();
</script>
@endpush
