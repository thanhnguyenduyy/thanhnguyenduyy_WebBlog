@extends('layouts.admin', ['currentView' => isset($post) ? 'Edit Entry' : 'New Journal Entry'])

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
<style>
    .Editor-panel .CodeMirror {
        background-color: transparent !important;
        color: inherit !important;
        border-color: #3f3f46 !important;
    }
    .dark .Editor-panel .editor-toolbar {
        background-color: #18181b !important;
        border-color: #27272a !important;
    }
    .dark .Editor-panel .editor-toolbar button {
        color: #d4d4d8 !important;
    }
    .dark .Editor-panel .editor-toolbar button.active, .dark .Editor-panel .editor-toolbar button:hover {
        background-color: #27272a !important;
    }
</style>
@endpush

@section('content')
<div class="animate-in max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-serif text-zinc-900 dark:text-white">{{ isset($post) ? 'Edit Entry' : 'New Journal Entry' }}</h2>
        <a href="{{ route('admin.blog.index') }}" class="text-sm text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Cancel</a>
    </div>

    <form action="{{ isset($post) ? route('admin.blog.update', $post) : route('admin.blog.store') }}" method="POST" class="space-y-6 bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-8 rounded-xl shadow-sm dark:shadow-none">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-1">
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Title</label>
                <input 
                    type="text" 
                    name="title"
                    id="post-title"
                    value="{{ old('title', $post->title ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="Enter post title..."
                    onkeyup="updateSlug(this.value)"
                    required
                />
            </div>

            <!-- Slug -->
            <div class="md:col-span-1">
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Slug</label>
                <input 
                    type="text" 
                    name="slug"
                    id="post-slug"
                    value="{{ old('slug', $post->slug ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                    placeholder="url-slug-here"
                />
            </div>
        </div>

        <!-- Category & Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Category</label>
                <select 
                    name="category"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none"
                >
                    <option value="IT" {{ old('category', $post->category ?? '') === 'IT' ? 'selected' : '' }}>IT & Tech</option>
                    <option value="PHOTOGRAPHY" {{ old('category', $post->category ?? '') === 'PHOTOGRAPHY' ? 'selected' : '' }}>Photography</option>
                    <option value="THOUGHTS" {{ old('category', $post->category ?? '') === 'THOUGHTS' ? 'selected' : '' }}>Thoughts</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Status</label>
                <select 
                    name="status"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none"
                >
                    <option value="Published" {{ old('status', $post->status ?? '') === 'Published' ? 'selected' : '' }}>Published</option>
                    <option value="Draft" {{ old('status', $post->status ?? '') === 'Draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
        </div>

        <!-- Metadata -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Reading Time (minutes)</label>
                <input 
                    type="number" 
                    name="reading_time"
                    value="{{ old('reading_time', $post->reading_time ?? '') }}"
                    class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                />
            </div>
            <div class="flex items-center space-x-4 pt-6">
                <input 
                    type="checkbox" 
                    name="is_featured"
                    id="is_featured"
                    {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 text-brand-blue bg-zinc-100 border-zinc-300 rounded focus:ring-brand-blue dark:focus:ring-brand-blue dark:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-700 dark:border-zinc-600"
                />
                <label for="is_featured" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Featured Post</label>
            </div>
        </div>

        <!-- Image URL -->
        <div>
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Image URL</label>
            <input 
                type="text" 
                name="image_url"
                value="{{ old('image_url', $post->image_url ?? '') }}"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors"
                placeholder="https://example.com/image.jpg"
            />
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2 flex justify-between">
                <span>Excerpt / Summary</span>
                <button 
                    type="button"
                    onclick="generateWithAI()"
                    id="ai-gen-btn"
                    class="flex items-center text-brand-blue text-[10px] hover:text-blue-700 dark:hover:text-blue-300 disabled:opacity-50 transition-colors"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    <span id="ai-btn-text">GENERATE WITH AI</span>
                </button>
            </label>
            <textarea 
                name="excerpt"
                id="post-excerpt"
                rows="3"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none resize-none transition-colors"
                placeholder="Brief description..."
            >{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        </div>

        <!-- Content -->
        <div class="Editor-panel">
            <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Content (Markdown)</label>
            <textarea 
                name="content"
                id="markdown-editor"
                rows="10"
                class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-700 dark:text-zinc-300 font-mono text-sm focus:border-brand-blue focus:outline-none transition-colors"
                placeholder="# Write your story here..."
            >{{ old('content', $post->content ?? '') }}</textarea>
        </div>
        
        <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 flex justify-end space-x-4 items-center">
            @if(isset($post))
                <span class="text-[10px] text-zinc-500 uppercase">Last updated: {{ $post->updated_at->format('M d, Y H:i') }}</span>
            @endif
            <button 
                type="submit"
                class="bg-brand-blue text-white dark:text-black font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 dark:hover:bg-blue-400 transition-colors shadow-lg shadow-blue-500/20"
            >
                Save Entry
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
<script>
    // Initialize EasyMDE
    const easyMDE = new EasyMDE({
        element: document.getElementById('markdown-editor'),
        spellChecker: false,
        autosave: {
            enabled: true,
            uniqueId: "journal-entry-{{ $post->id ?? 'new' }}",
            delay: 1000,
        },
        status: ["chars", "lines", "words"],
        showIcons: ["code", "table"],
    });

    function updateSlug(title) {
        const slug = title.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('post-slug').value = slug;
    }

    async function generateWithAI() {
        const title = document.getElementById('post-title').value;
        const btn = document.getElementById('ai-gen-btn');
        const btnText = document.getElementById('ai-btn-text');
        const excerptField = document.getElementById('post-excerpt');

        if (!title) {
            alert("Please enter a title first");
            return;
        }

        btn.disabled = true;
        btnText.textContent = 'GENERATING...';

        try {
            const response = await fetch('{{ route('admin.blog.generate') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ title })
            });
            const data = await response.json();
            excerptField.value = data.suggestion;
        } catch (error) {
            console.error('AI generation failed:', error);
        } finally {
            btn.disabled = false;
            btnText.textContent = 'GENERATE WITH AI';
        }
    }
</script>
@endpush

