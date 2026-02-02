@extends('layouts.admin', ['currentView' => 'resources'])

@section('content')
<div class="space-y-6 h-full flex flex-col animate-in">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Resources</h2>
            <p class="text-zinc-500 text-sm mt-1">Manage your digital assets, presets, and code snippets.</p>
        </div>
        <button class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Upload Resource
        </button>
    </div>

    <!-- Filters/Tabs -->
    <div class="flex space-x-6 pb-2 border-b border-zinc-200 dark:border-zinc-800">
        <button class="text-zinc-900 dark:text-white border-b-2 border-brand-blue pb-2 text-sm font-medium">All Resources</button>
        <button class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300 pb-2 text-sm transition-colors">Presets</button>
        <button class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300 pb-2 text-sm transition-colors">Code</button>
        <button class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300 pb-2 text-sm transition-colors">PDFs</button>
    </div>

    <!-- List View -->
    <div class="flex-1 overflow-auto">
        <div class="grid gap-4 mt-4">
            @foreach($resources as $resource)
            <div class="group bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-4 rounded-xl flex items-center space-x-4 hover:border-zinc-400 dark:hover:border-zinc-700 transition-all shadow-sm dark:shadow-none">
                <div class="w-12 h-12 bg-zinc-100 dark:bg-zinc-900 rounded-lg flex items-center justify-center flex-shrink-0">
                    @if($resource['type'] === 'PRESET')
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-500"><circle cx="12" cy="12" r="10"></circle><path d="m9.09 9 3-4 3 4"></path><path d="m9.09 15 3 4 3-4"></path><line x1="12" y1="5" x2="12" y2="19"></line></svg>
                    @elseif($resource['type'] === 'CODE')
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-zinc-900 dark:text-white font-serif text-lg truncate">{{ $resource['title'] }}</h3>
                    <p class="text-zinc-500 text-sm truncate">{{ $resource['description'] }}</p>
                </div>
                <div class="flex items-center space-x-8 text-right hidden md:flex">
                    <div>
                        <p class="text-[10px] text-zinc-500 uppercase tracking-widest mb-0.5">Downloads</p>
                        <p class="text-sm font-mono text-zinc-900 dark:text-zinc-300">{{ number_format($resource['downloads']) }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-zinc-500 uppercase tracking-widest mb-0.5">Size</p>
                        <p class="text-sm font-mono text-zinc-900 dark:text-zinc-300">{{ $resource['fileSize'] }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg text-zinc-500"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                    <button class="p-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg text-zinc-500"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
