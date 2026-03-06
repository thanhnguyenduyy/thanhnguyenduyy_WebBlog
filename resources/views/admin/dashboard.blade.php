@extends('layouts.admin', ['currentView' => 'dashboard'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
@endpush

@section('content')
<div class="space-y-8 animate-in">
    {{-- Header --}}
    <div class="flex justify-between items-end">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white mb-2">Dashboard</h2>
            <p class="text-zinc-500 dark:text-zinc-400 text-sm">Your portfolio at a glance.</p>
        </div>
        <div class="text-right">
            <p class="text-[10px] text-zinc-400 uppercase tracking-widest mb-1">Updated</p>
            <p class="text-zinc-600 dark:text-zinc-400 font-mono text-xs">{{ now()->format('M d, Y · H:i') }}</p>
        </div>
    </div>

    {{-- Stats Grid --}}
    @php
        $colors = [
            ['card' => 'stat-card-blue',   'icon_bg' => 'bg-sky-500/10 dark:bg-sky-400/10',     'icon_text' => 'text-sky-500 dark:text-sky-400',       'gradient' => 'from-sky-500 to-blue-600'],
            ['card' => 'stat-card-emerald', 'icon_bg' => 'bg-emerald-500/10 dark:bg-emerald-400/10', 'icon_text' => 'text-emerald-500 dark:text-emerald-400', 'gradient' => 'from-emerald-500 to-teal-600'],
            ['card' => 'stat-card-violet',  'icon_bg' => 'bg-violet-500/10 dark:bg-violet-400/10',  'icon_text' => 'text-violet-500 dark:text-violet-400',  'gradient' => 'from-violet-500 to-purple-600'],
            ['card' => 'stat-card-amber',   'icon_bg' => 'bg-amber-500/10 dark:bg-amber-400/10',   'icon_text' => 'text-amber-500 dark:text-amber-400',   'gradient' => 'from-amber-500 to-orange-600'],
        ];
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach($stats as $i => $stat)
        @php $c = $colors[$i]; @endphp
        <div class="stat-card {{ $c['card'] }} bg-white dark:bg-brand-panel border border-zinc-200/80 dark:border-brand-border rounded-2xl p-5 shadow-sm dark:shadow-none">
            <div class="flex items-center justify-between mb-5">
                <div class="stat-icon w-11 h-11 rounded-xl {{ $c['icon_bg'] }} flex items-center justify-center {{ $c['icon_text'] }}">
                    @switch($stat['icon'])
                        @case('book')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a4 4 0 0 0-4-4H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a4 4 0 0 1 4-4h6z"></path></svg>
                        @break
                        @case('briefcase')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        @break
                        @case('camera')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                        @break
                        @case('mail')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        @break
                    @endswitch
                </div>
            </div>
            <h3 class="text-3xl font-serif font-semibold count-value {{ $c['gradient'] }} mb-1">{{ $stat['value'] }}</h3>
            <span class="text-zinc-400 dark:text-zinc-500 text-xs font-medium uppercase tracking-wider">{{ $stat['label'] }}</span>
        </div>
        @endforeach
    </div>

    {{-- Recent Messages --}}
    <div class="bg-white dark:bg-brand-panel border border-zinc-200/80 dark:border-brand-border rounded-2xl shadow-sm dark:shadow-none overflow-hidden">
        <div class="px-6 py-4 border-b border-zinc-100 dark:border-zinc-800/50 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h3 class="text-zinc-900 dark:text-white font-serif font-medium">Recent Messages</h3>
                @if($recentMessages->where('is_read', false)->count() > 0)
                    <span class="text-[10px] font-bold bg-brand-blue/10 text-brand-blue px-2 py-0.5 rounded-full">
                        {{ $recentMessages->where('is_read', false)->count() }} new
                    </span>
                @endif
            </div>
            <a href="{{ route('admin.inbox.index') }}" class="text-xs text-brand-blue hover:underline font-medium">View All →</a>
        </div>
        <div class="divide-y divide-zinc-100 dark:divide-zinc-800/50">
            @forelse($recentMessages as $message)
            <div class="message-row flex items-center gap-4 px-6 py-4 hover:bg-zinc-50 dark:hover:bg-zinc-800/30">
                <div class="w-9 h-9 rounded-full {{ $message->is_read ? 'bg-zinc-100 dark:bg-zinc-800' : 'bg-gradient-to-br from-brand-blue/20 to-sky-400/20' }} flex items-center justify-center flex-shrink-0">
                    <span class="text-xs font-bold {{ $message->is_read ? 'text-zinc-400' : 'text-brand-blue' }}">{{ mb_strtoupper(mb_substr($message->name, 0, 1)) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-0.5">
                        <p class="text-sm text-zinc-900 dark:text-white font-medium truncate">{{ $message->name }}</p>
                        @if(!$message->is_read)
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-blue flex-shrink-0 shadow-[0_0_6px_rgba(0,163,255,0.5)]"></span>
                        @endif
                    </div>
                    <p class="text-xs text-zinc-400 dark:text-zinc-500 truncate">{{ $message->subject ?? Str::limit($message->message, 60) }}</p>
                </div>
                <span class="text-[10px] text-zinc-400 dark:text-zinc-600 whitespace-nowrap font-mono">{{ $message->created_at->diffForHumans(null, true) }}</span>
            </div>
            @empty
            <div class="px-6 py-10 text-center">
                <p class="text-sm text-zinc-400 dark:text-zinc-500">No messages yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
