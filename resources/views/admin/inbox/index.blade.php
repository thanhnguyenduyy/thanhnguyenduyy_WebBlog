@extends('layouts.admin', ['currentView' => 'Inbox'])

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Inbox</h2>
        <p class="text-zinc-500 text-sm mt-1">Quản lý các yêu cầu và tin nhắn từ khách truy cập danh mục (portfolio) của bạn.</p>
    </div>

    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl shadow-sm dark:shadow-none overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-zinc-200 dark:border-brand-border/50 bg-zinc-50 dark:bg-zinc-900/50">
                    <th class="px-6 py-4 text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Sender</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Subject</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Date</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-zinc-500 uppercase tracking-widest text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100 dark:divide-brand-border">
                @forelse($messages as $message)
                <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30 transition-colors {{ !$message->is_read ? 'bg-brand-blue/5' : '' }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if(!$message->is_read)
                                <span class="flex-shrink-0 h-2 w-2 rounded-full bg-brand-blue animate-pulse" title="Unread"></span>
                            @else
                                <span class="flex-shrink-0 h-2 w-2 rounded-full bg-zinc-300 dark:bg-zinc-700" title="Read"></span>
                            @endif
                            <div class="flex flex-col">
                                <span class="text-zinc-900 dark:text-white font-medium text-sm">{{ $message->name }}</span>
                                <span class="text-zinc-500 text-xs">{{ $message->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.inbox.show', $message) }}" class="text-zinc-600 dark:text-zinc-400 text-sm hover:text-brand-blue transition-colors {{ !$message->is_read ? 'font-bold text-zinc-900 dark:text-white' : '' }}">
                            {{ $message->subject }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-zinc-500 text-xs">{{ $message->created_at->format('M d, Y') }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end items-center space-x-3">
                            <form action="{{ route('admin.inbox.toggle-read', $message) }}" method="POST">
                                @csrf
                                <button type="submit" class="p-2 text-zinc-400 hover:text-brand-blue transition-colors" title="{{ $message->is_read ? 'Mark as unread' : 'Mark as read' }}">
                                    @if($message->is_read)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path><path d="M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path><line x1="2" y1="2" x2="22" y2="22"></line><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path></svg>
                                    @endif
                                </button>
                            </form>
                            <form action="{{ route('admin.inbox.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete message?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-zinc-400 hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-300 mb-4 font-thin"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                            <p class="text-zinc-500 font-serif italic">Your inbox is quiet for now.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
