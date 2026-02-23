@extends('layouts.admin', ['currentView' => 'Message Detail'])

@section('content')
<div class="animate-in max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.inbox.index') }}" class="p-2 bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-lg text-zinc-500 hover:text-zinc-900 dark:hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </a>
            <h2 class="text-2xl font-serif text-zinc-900 dark:text-white">Message Detail</h2>
        </div>
        <div class="flex items-center space-x-3">
            <form action="{{ route('admin.inbox.toggle-read', $message) }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-bold px-4 py-2 rounded-lg border {{ $message->is_read ? 'border-zinc-200 dark:border-brand-border text-zinc-500' : 'border-brand-blue/30 text-brand-blue bg-brand-blue/5' }} uppercase tracking-widest hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors">
                    Mark as {{ $message->is_read ? 'Unread' : 'Read' }}
                </button>
            </form>
            <form action="{{ route('admin.inbox.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message permanently?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl overflow-hidden shadow-sm dark:shadow-none">
        <div class="p-8 border-b border-zinc-100 dark:border-brand-border bg-zinc-50/50 dark:bg-zinc-900/50">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-serif text-zinc-900 dark:text-white mb-2">{{ $message->subject }}</h1>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <div class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 opacity-50"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="font-medium text-zinc-900 dark:text-white">{{ $message->name }}</span>
                        </div>
                        <div class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 opacity-50"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <a href="mailto:{{ $message->email }}" class="hover:text-brand-blue">{{ $message->email }}</a>
                        </div>
                        <div class="flex items-center text-zinc-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 opacity-50"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            {{ $message->created_at->format('M d, Y · H:i') }}
                        </div>
                    </div>
                </div>
                <div class="px-3 py-1 bg-zinc-100 dark:bg-zinc-800 rounded-full text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                    ID: #{{ $message->id }}
                </div>
            </div>
        </div>
        <div class="p-8">
            <div class="prose dark:prose-invert max-w-none text-zinc-700 dark:text-zinc-300 leading-relaxed whitespace-pre-wrap">
{{ $message->message }}
            </div>
        </div>
        <div class="p-8 bg-zinc-50 dark:bg-zinc-900 border-t border-zinc-100 dark:border-brand-border">
            <div class="flex justify-between items-center text-xs text-zinc-500">
                <span>Origin: Contact Form</span>
                <a href="mailto:{{ $message->email }}" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-bold uppercase tracking-widest hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="m22 2-7 20-4-9-9-4Z"></path><path d="M22 2 11 13"></path></svg>
                    Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
