@extends('layouts.admin', ['currentView' => 'Journal'])

@section('content')
<div class="space-y-6 h-full flex flex-col">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Journal</h2>
            <p class="text-zinc-500 text-sm mt-1">Manage your thoughts on bits, bytes, and bokeh.</p>
        </div>
        <a href="{{ route('admin.blog.create') }}" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></svg>
            New Entry
        </a>
    </div>

    <!-- Filters -->
    <div class="flex space-x-4 pb-2 border-b border-zinc-200 dark:border-zinc-800">
        <button class="text-zinc-900 dark:text-white border-b-2 border-brand-blue pb-2 text-sm font-medium">All Posts</button>
        <button class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300 pb-2 text-sm transition-colors">Published</button>
        <button class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300 pb-2 text-sm transition-colors">Drafts</button>
        <div class="ml-auto relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-zinc-500"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" placeholder="Search..." class="bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-800 rounded-full pl-9 pr-4 py-1 text-xs text-zinc-900 dark:text-white focus:outline-none focus:border-zinc-400 dark:focus:border-zinc-600 w-48 transition-colors" />
        </div>
    </div>

    <!-- List -->
    <div class="flex-1 overflow-auto">
        <div class="grid gap-4">
            @foreach($posts as $post)
            <div class="group bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-4 rounded-xl flex items-center space-x-4 hover:border-zinc-400 dark:hover:border-zinc-700 transition-all shadow-sm dark:shadow-none">
                {{-- Original image colors --}}
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded-lg group-hover:grayscale-0 transition-all duration-500" />
                <div class="flex-1 min-w-0">
                    <div class="flex items-center space-x-2 mb-1">
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded border {{ $post->category === 'IT' ? 'border-blue-200 dark:border-blue-900 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/10' : 'border-purple-200 dark:border-purple-900 text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-900/10' }}">
                            {{ $post->category }}
                        </span>
                        @if($post->is_featured)
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded border border-amber-200 dark:border-amber-900 text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-900/10">
                            FEATURED
                        </span>
                        @endif
                        <span class="text-[10px] text-zinc-500 dark:text-zinc-600 uppercase tracking-widest">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'DRAFT' }}</span>
                    </div>
                    <h3 class="text-zinc-900 dark:text-white font-serif text-lg truncate">{{ $post->title }}</h3>
                    <p class="text-zinc-500 text-sm truncate">{{ $post->excerpt }}</p>
                </div>
                <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.blog.edit', $post) }}" class="p-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </a>
                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg text-zinc-500 dark:text-zinc-600 hover:text-red-600 dark:hover:text-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
