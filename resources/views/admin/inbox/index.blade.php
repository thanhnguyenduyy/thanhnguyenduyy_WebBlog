@extends('layouts.admin', ['currentView' => 'Inbox'])

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Inbox</h2>
        <p class="text-zinc-500 text-sm mt-1">Manage inquiries and messages from your portfolio visitors.</p>
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
            <tbody class="divide-y divide-zinc-200 dark:divide-brand-border/30">
                @forelse($messages as $msg)
                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors {{ $msg->is_read ? 'opacity-60' : 'font-medium' }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </div>
                            <div>
                                <p class="text-sm text-zinc-900 dark:text-white">{{ $msg->name }}</p>
                                <p class="text-[10px] text-zinc-500">{{ $msg->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-zinc-700 dark:text-zinc-300 truncate max-w-xs">{{ $msg->subject ?? 'No Subject' }}</p>
                    </td>
                    <td class="px-6 py-4 text-xs text-zinc-500">
                        {{ $msg->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end space-x-2">
                             <a href="{{ route('admin.inbox.show', $msg) }}" class="p-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg text-zinc-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                             </a>
                             <form action="{{ route('admin.inbox.destroy', $msg) }}" method="POST" onsubmit="return confirm('Delete message?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg text-zinc-500 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                             </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-zinc-500 text-sm italic">
                        No messages found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
