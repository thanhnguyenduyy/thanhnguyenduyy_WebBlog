@extends('layouts.admin', ['currentView' => 'IT Projects'])

@section('content')
<div class="space-y-6 h-full flex flex-col">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">IT Projects</h2>
            <p class="text-zinc-500 text-sm mt-1">Manage your digital products built with logic and precision.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></svg>
            New Project
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
        <div class="group bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl overflow-hidden hover:border-brand-blue/30 transition-all shadow-sm dark:shadow-none">
            <div class="aspect-video relative overflow-hidden">
                {{-- Original image colors (Removed grayscale filter) --}}
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:grayscale-0 transition-all duration-700">
                
                @if($project->is_featured)
                <div class="absolute top-3 left-3 z-10">
                    <div class="bg-yellow-400 text-black p-1.5 rounded-lg shadow-lg ring-2 ring-yellow-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </div>
                </div>
                @endif

                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 bg-white/10 backdrop-blur-md rounded-lg text-white hover:bg-brand-blue/20 transition-colors border border-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-white/10 backdrop-blur-md rounded-lg text-red-400 hover:bg-red-500/20 transition-colors border border-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <h3 class="text-xl font-serif font-medium text-zinc-900 dark:text-white mb-2">{{ $project->title }}</h3>
                <p class="text-zinc-500 text-sm line-clamp-2 mb-4">{{ $project->description }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->tech_stack ?? [] as $tech)
                    <span class="text-[10px] bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-2 py-1 rounded font-medium uppercase tracking-widest">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
