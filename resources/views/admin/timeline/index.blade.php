@extends('layouts.admin', ['currentView' => 'Timeline'])

@section('content')
<div class="space-y-6 animate-in">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Life & Work Timeline</h2>
            <p class="text-zinc-500 text-sm mt-1">Document your journey and accomplishments over the years.</p>
        </div>
        <button onclick="openModal()" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors shadow-lg dark:shadow-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Milestone
        </button>
    </div>

    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl overflow-hidden shadow-sm dark:shadow-none">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-zinc-50 dark:bg-zinc-900 text-zinc-500 text-[10px] uppercase tracking-widest font-bold border-b border-zinc-200 dark:border-brand-border">
                    <th class="px-6 py-4 w-24">Year</th>
                    <th class="px-6 py-4 w-32">Type</th>
                    <th class="px-6 py-4">Milestone</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100 dark:divide-brand-border">
                @forelse($timeline as $item)
                <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30 transition-colors group">
                    <td class="px-6 py-4">
                        <span class="text-zinc-900 dark:text-white font-mono font-bold">{{ $item->year }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full border 
                            {{ $item->type === 'IT' ? 'border-blue-200 text-blue-600 bg-blue-50 dark:bg-blue-900/10 dark:border-blue-900' : '' }}
                            {{ $item->type === 'PHOTO' ? 'border-amber-200 text-amber-600 bg-amber-50 dark:bg-amber-900/10 dark:border-amber-900' : '' }}
                            {{ $item->type === 'LIFE' ? 'border-zinc-200 text-zinc-600 bg-zinc-50 dark:bg-zinc-900/10 dark:border-zinc-800' : '' }}
                            {{ $item->type === 'CAREER' ? 'border-emerald-200 text-emerald-600 bg-emerald-50 dark:bg-emerald-900/10 dark:border-emerald-900' : '' }}
                        ">
                            {{ $item->type }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="text-zinc-900 dark:text-white font-serif text-base">{{ $item->title }}</span>
                            <span class="text-zinc-500 text-xs mt-1">{{ $item->description }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button onclick="editTimeline({{ json_encode($item) }})" class="p-2 text-zinc-400 hover:text-brand-blue transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </button>
                            <form action="{{ route('admin.timeline.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this milestone?')">
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
                    <td colspan="4" class="px-6 py-20 text-center text-zinc-500 font-serif italic">No milestones found. Add your first achievement.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="timeline-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl w-full max-w-lg p-8 shadow-2xl animate-in fade-in zoom-in duration-300">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-serif text-zinc-900 dark:text-white" id="modal-title">New Milestone</h3>
            <button onclick="closeModal()" class="p-2 text-zinc-500 hover:text-zinc-900 dark:hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        <form id="timeline-form" method="POST" class="space-y-4">
            @csrf
            <div id="method-spoofing"></div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Year</label>
                    <input type="text" name="year" id="tl-year" placeholder="e.g. 2024" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Type</label>
                    <select name="type" id="tl-type" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue">
                        <option value="IT">IT & Tech</option>
                        <option value="PHOTO">Photography</option>
                        <option value="LIFE">Life Event</option>
                        <option value="CAREER">Career Milestone</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Milestone Title</label>
                <input type="text" name="title" id="tl-title" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Description</label>
                <textarea name="description" id="tl-description" rows="3" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue resize-none" required></textarea>
            </div>

            <button type="submit" class="w-full bg-brand-blue text-white dark:text-black font-semibold py-3 rounded-xl hover:bg-blue-600 dark:hover:bg-blue-400 transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98]">
                Save Milestone
            </button>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('timeline-modal');
    const form = document.getElementById('timeline-form');
    const title = document.getElementById('modal-title');
    const methodSpoofing = document.getElementById('method-spoofing');

    function openModal() {
        modal.classList.remove('hidden');
        title.innerText = 'Add New Milestone';
        form.action = "{{ route('admin.timeline.store') }}";
        methodSpoofing.innerHTML = '';
        form.reset();
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    function editTimeline(item) {
        modal.classList.remove('hidden');
        title.innerText = 'Edit Milestone';
        form.action = `/admin/timeline/${item.id}`;
        methodSpoofing.innerHTML = '@method("PUT")';
        
        document.getElementById('tl-year').value = item.year;
        document.getElementById('tl-type').value = item.type;
        document.getElementById('tl-title').value = item.title;
        document.getElementById('tl-description').value = item.description;
    }
</script>
@endsection
