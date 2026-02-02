@extends('layouts.admin', ['currentView' => 'profile'])

@section('content')
<div class="max-w-4xl mx-auto space-y-8 animate-in">
    <div>
        <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Profile & Story</h2>
        <p class="text-zinc-500 text-sm mt-1">Manage your public identity and career timeline.</p>
    </div>

    <!-- Hero Section Status -->
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl p-8 shadow-sm dark:shadow-none">
        <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-brand-blue ring-4 ring-brand-blue/10">
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=200" alt="Avatar" class="w-full h-full object-cover">
                </div>
                <button class="absolute bottom-0 right-0 bg-zinc-900 dark:bg-white text-white dark:text-black p-2 rounded-full shadow-lg hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                </button>
            </div>
            <div class="flex-1 space-y-4 text-center md:text-left">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Display Name</label>
                        <input type="text" value="Nguyễn Duy Thanh" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Primary Slogan</label>
                        <input type="text" value="Crafting Digital Experiences & Capturing Light" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Short Bio</label>
                    <textarea rows="3" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors resize-none">I am a multidisciplinary creator sitting at the intersection of technology and art.</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Career Timeline -->
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl overflow-hidden shadow-sm dark:shadow-none">
        <div class="p-6 border-b border-zinc-200 dark:border-brand-border/50 flex justify-between items-center">
            <h3 class="text-lg font-medium text-zinc-900 dark:text-white">Career Timeline</h3>
            <button class="text-sm bg-zinc-900 dark:bg-white text-white dark:text-black px-4 py-1.5 rounded-lg font-medium">Add Entry</button>
        </div>
        <div class="p-6 space-y-6">
            @php
                $timeline = [
                    ['year' => '2024', 'title' => 'Senior Fullstack Engineer', 'desc' => 'Leading development on high-performance web systems.'],
                    ['year' => '2022', 'title' => 'Street Photography Exhibition', 'desc' => 'First solo gallery showing in Ho Chi Minh City.'],
                    ['year' => '2020', 'title' => 'Launched Aperture Engine', 'desc' => 'Open source RAW processor used by 5k+ users.'],
                ];
            @endphp
            @foreach($timeline as $item)
            <div class="flex items-start space-x-4 group">
                <div class="text-brand-blue font-mono font-bold text-sm pt-1">{{ $item['year'] }}</div>
                <div class="flex-1 bg-zinc-50 dark:bg-zinc-900/50 p-4 rounded-lg border border-zinc-100 dark:border-zinc-800 group-hover:border-brand-blue/30 transition-colors">
                    <h4 class="text-sm font-bold text-zinc-900 dark:text-white mb-1">{{ $item['title'] }}</h4>
                    <p class="text-xs text-zinc-500 leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-1.5 text-zinc-400 hover:text-zinc-900 dark:hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                    <button class="p-1.5 text-zinc-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end">
        <button class="bg-brand-blue text-white dark:text-black font-bold py-3 px-8 rounded-lg hover:bg-blue-600 transition-colors">Save All Changes</button>
    </div>
</div>
@endsection
