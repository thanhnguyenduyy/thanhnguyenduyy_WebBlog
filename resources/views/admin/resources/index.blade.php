@extends('layouts.admin', ['currentView' => 'Resources'])

@section('content')
<div class="space-y-6 h-full flex flex-col animate-in">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Resources</h2>
            <p class="text-zinc-500 text-sm mt-1">Manage your digital assets, presets, and code snippets.</p>
        </div>
        <button onclick="openModal()" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors shadow-lg dark:shadow-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Resource
        </button>
    </div>

    <!-- List View -->
    <div class="flex-1 overflow-auto">
        <div class="grid gap-4 mt-4">
            @forelse($resources as $resource)
            <div class="group bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-4 rounded-xl flex items-center space-x-4 hover:border-zinc-400 dark:hover:border-zinc-700 transition-all shadow-sm dark:shadow-none">
                <div class="w-12 h-12 bg-zinc-100 dark:bg-zinc-900 rounded-lg flex items-center justify-center flex-shrink-0">
                    @if($resource->type === 'PRESET')
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-500"><circle cx="12" cy="12" r="10"></circle><path d="m9.09 9 3-4 3 4"></path><path d="m9.09 15 3 4 3-4"></path><line x1="12" y1="5" x2="12" y2="19"></line></svg>
                    @elseif($resource->type === 'CODE')
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    @elseif($resource->type === 'PDF')
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-500"><path d="m7.5 4.27 9 5.15"></path><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path><path d="m3.3 7 8.7 5 8.7-5"></path><path d="M12 22V12"></path></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-zinc-900 dark:text-white font-serif text-lg truncate">{{ $resource->title }}</h3>
                    <p class="text-zinc-500 text-sm truncate">{{ $resource->description }}</p>
                </div>
                <div class="flex items-center space-x-8 text-right hidden md:flex">
                    <div>
                        <p class="text-[10px] text-zinc-500 uppercase tracking-widest mb-0.5">Downloads</p>
                        <p class="text-sm font-mono text-zinc-900 dark:text-zinc-300">{{ number_format($resource->downloads) }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-zinc-500 uppercase tracking-widest mb-0.5">Size</p>
                        <p class="text-sm font-mono text-zinc-900 dark:text-zinc-300">{{ $resource->file_size ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button onclick="editResource({{ json_encode($resource) }})" class="p-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg text-zinc-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </button>
                    <form action="{{ route('admin.resources.destroy', $resource) }}" method="POST" onsubmit="return confirm('Delete this resource?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg text-red-400 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="text-center py-20 border-2 border-dashed border-zinc-200 dark:border-zinc-800 rounded-3xl">
                <p class="text-zinc-500 font-serif italic text-lg">No resources found. Add your first digital item.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal -->
<div id="resource-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl w-full max-w-lg p-8 shadow-2xl animate-in fade-in zoom-in duration-300">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-serif text-zinc-900 dark:text-white" id="modal-title">Add New Resource</h3>
            <button onclick="closeModal()" class="p-2 text-zinc-500 hover:text-zinc-900 dark:hover:text-white rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        <form id="resource-form" method="POST" class="space-y-4">
            @csrf
            <div id="method-spoofing"></div>
            
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Title</label>
                <input type="text" name="title" id="res-title" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Description</label>
                <input type="text" name="description" id="res-description" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Type</label>
                    <select name="type" id="res-type" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue">
                        <option value="PDF">PDF Guide</option>
                        <option value="PRESET">Preset</option>
                        <option value="CODE">Code Snippet</option>
                        <option value="OTHER">Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">File Size</label>
                    <input type="text" name="file_size" id="res-size" placeholder="e.g. 2.4 MB" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Resource URL</label>
                <input type="url" name="url" id="res-url" placeholder="https://..." class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
            </div>

            <button type="submit" class="w-full bg-brand-blue text-white dark:text-black font-semibold py-3 rounded-xl hover:bg-blue-600 dark:hover:bg-blue-400 transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98]">
                Save Resource
            </button>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('resource-modal');
    const form = document.getElementById('resource-form');
    const title = document.getElementById('modal-title');
    const methodSpoofing = document.getElementById('method-spoofing');

    function openModal() {
        modal.classList.remove('hidden');
        title.innerText = 'Add New Resource';
        form.action = "{{ route('admin.resources.store') }}";
        methodSpoofing.innerHTML = '';
        form.reset();
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    function editResource(resource) {
        modal.classList.remove('hidden');
        title.innerText = 'Edit Resource';
        form.action = `/admin/resources/${resource.id}`;
        methodSpoofing.innerHTML = '@method("PUT")';
        
        document.getElementById('res-title').value = resource.title;
        document.getElementById('res-description').value = resource.description;
        document.getElementById('res-type').value = resource.type;
        document.getElementById('res-size').value = resource.file_size || '';
        document.getElementById('res-url').value = resource.url;
    }
</script>
@endsection
