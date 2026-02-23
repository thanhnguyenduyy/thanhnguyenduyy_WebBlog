@extends('layouts.admin', ['currentView' => 'Photography'])

@section('content')
<div class="space-y-6 pb-24">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Photography</h2>
            <p class="text-zinc-500 text-sm mt-1">Manage your visual storytelling through the lens.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <!-- Filter Dropdown -->
            <form action="{{ route('admin.gallery.index') }}" method="GET" class="flex items-center">
                <select name="category_id" onchange="this.form.submit()" class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border px-4 py-2 rounded-lg text-sm text-zinc-600 dark:text-zinc-300 focus:outline-none focus:border-brand-blue transition-colors shadow-sm">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>

            <a href="{{ route('admin.gallery-categories.index') }}" class="flex items-center bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border px-4 py-2 rounded-lg text-zinc-600 dark:text-zinc-300 text-sm font-medium hover:bg-zinc-50 transition-colors shadow-sm">
                Manage Categories
            </a>
            <button onclick="document.getElementById('upload-modal').classList.remove('hidden')" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors shadow-lg dark:shadow-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                Bulk Upload
            </button>
        </div>
    </div>

    <!-- Toolbar / Selection info -->
    <div class="flex items-center justify-between text-xs text-zinc-500 uppercase tracking-widest font-bold border-b border-zinc-200 dark:border-zinc-800 pb-4">
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <input type="checkbox" id="select-all" class="w-4 h-4 rounded border-zinc-300 dark:border-zinc-700 text-brand-blue focus:ring-brand-blue/20 transition-all cursor-pointer mr-2">
                <label for="select-all" class="cursor-pointer">Select All</label>
            </div>
            <span class="text-zinc-300">|</span>
            <span>Total: {{ count($photos) }}</span>
            <span class="mx-2 text-zinc-300">|</span>
            <span>Categories: {{ count($categories) }}</span>
        </div>
        
        <div id="selection-status" class="hidden text-brand-blue animate-pulse">
            <span id="selected-count">0</span> items selected
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach($photos as $photo)
        <div class="group relative aspect-square bg-zinc-200 dark:bg-zinc-800 rounded-lg overflow-hidden border border-zinc-200 dark:border-brand-border hover:border-brand-blue/30 transition-all photography-item">
            <!-- Individual selection checkbox -->
            <input type="checkbox" name="selected_photos[]" value="{{ $photo->id }}" class="photo-checkbox absolute top-3 left-3 z-20 w-5 h-5 rounded-md border-white/20 bg-black/40 text-brand-blue focus:ring-brand-blue/50 transition-all cursor-pointer opacity-0 group-hover:opacity-100 checked:opacity-100">

            <img src="{{ $photo->url }}" alt="{{ $photo->title }}" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
            
            @if($photo->is_featured)
                <div class="absolute top-2 right-2 bg-amber-500 text-white text-[8px] px-1.5 py-0.5 rounded-full font-bold shadow-lg z-10 uppercase">Featured</div>
            @endif

            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-between p-3 pointer-events-none">
                <div class="flex justify-end pointer-events-auto">
                    <form action="{{ route('admin.gallery.destroy', $photo) }}" method="POST" onsubmit="return confirm('Delete this photo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 bg-black/40 backdrop-blur-md rounded-lg text-white hover:text-red-400 border border-white/10 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </form>
                </div>
                <div>
                    <h4 class="text-white font-medium text-[10px] truncate">{{ $photo->title }}</h4>
                    <div class="flex items-center space-x-2 mt-0.5">
                        <span class="text-brand-blue text-[8px] uppercase tracking-tighter">{{ $photo->galleryCategory->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Floating Mass Action Bar -->
<div id="mass-action-bar" class="fixed bottom-8 left-1/2 -translate-x-1/2 bg-zinc-900 border border-white/10 px-6 py-4 rounded-2xl shadow-2xl flex items-center space-x-6 z-50 transform translate-y-32 transition-transform duration-300">
    <div class="text-white">
        <span id="floating-count" class="font-bold text-brand-blue mr-1">0</span>
        <span class="text-xs uppercase tracking-widest font-bold opacity-70">Captured selected</span>
    </div>
    <div class="h-6 w-[1px] bg-white/10"></div>
    <div class="flex items-center space-x-3">
        <form id="mass-delete-form" action="{{ route('admin.gallery.mass-destroy') }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá vĩnh viễn những tấm ảnh đã chọn không?')">
            @csrf
            <div id="selected-ids-container"></div>
            <button type="submit" class="flex items-center bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-widest transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                Delete Selected
            </button>
        </form>
        <button onclick="deselectAll()" class="text-white/50 hover:text-white text-[10px] font-bold uppercase tracking-widest px-2 transition-colors">Cancel</button>
    </div>
</div>

<!-- Bulk Upload Modal -->
<div id="upload-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl w-full max-w-lg p-8 shadow-2xl animate-in fade-in zoom-in duration-300">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-serif text-zinc-900 dark:text-white">Bulk Photo Upload</h3>
                <p class="text-zinc-500 text-xs mt-1">Add multiple captures to your gallery.</p>
            </div>
            <button onclick="document.getElementById('upload-modal').classList.add('hidden')" class="p-2 text-zinc-500 hover:text-zinc-900 dark:hover:text-white rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="relative group">
                <input type="file" name="photos[]" multiple required accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="updatePreviews(this)">
                <div id="default-upload-ui" class="border-2 border-dashed border-zinc-200 dark:border-zinc-800 rounded-2xl p-8 text-center group-hover:border-brand-blue/30 transition-all bg-zinc-50 dark:bg-zinc-900/50">
                    <div class="w-16 h-16 bg-brand-blue/10 rounded-full flex items-center justify-center mx-auto mb-4 text-brand-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                    </div>
                    <p id="file-count-text" class="text-sm font-bold text-zinc-900 dark:text-white uppercase tracking-widest">Select Captures</p>
                    <p class="text-zinc-500 text-[10px] mt-1 uppercase">JPG, PNG or WebP max 5MB</p>
                </div>
                
                <div id="preview-container" class="mt-4 grid grid-cols-3 gap-3">
                    <!-- Thumbnails will be injected here -->
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <!-- Category Select -->
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Target Category</label>
                    <select name="gallery_category_id" required class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue transition-colors">
                        <option value="">Select a category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full bg-brand-blue text-white dark:text-black font-semibold py-3 rounded-xl hover:bg-blue-600 dark:hover:bg-blue-400 transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98]">
                Start Processing Uploads
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Selection Logic
    const selectAll = document.getElementById('select-all');
    const photoCheckboxes = document.querySelectorAll('.photo-checkbox');
    const massActionBar = document.getElementById('mass-action-bar');
    const selectedCount = document.getElementById('selected-count');
    const floatingCount = document.getElementById('floating-count');
    const selectedIdsContainer = document.getElementById('selected-ids-container');
    const selectionStatus = document.getElementById('selection-status');

    function updateMassActionBar() {
        const checkedCount = document.querySelectorAll('.photo-checkbox:checked').length;
        
        if (checkedCount > 0) {
            massActionBar.classList.remove('translate-y-32');
            selectionStatus.classList.remove('hidden');
        } else {
            massActionBar.classList.add('translate-y-32');
            selectionStatus.classList.add('hidden');
        }

        selectedCount.textContent = checkedCount;
        floatingCount.textContent = checkedCount;

        // Update hidden inputs for mass delete
        selectedIdsContainer.innerHTML = '';
        document.querySelectorAll('.photo-checkbox:checked').forEach(cb => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ids[]';
            input.value = cb.value;
            selectedIdsContainer.appendChild(input);
        });

        // Sync select-all checkbox state
        selectAll.checked = (checkedCount === photoCheckboxes.length && photoCheckboxes.length > 0);
    }

    selectAll.addEventListener('change', () => {
        photoCheckboxes.forEach(cb => {
            cb.checked = selectAll.checked;
        });
        updateMassActionBar();
    });

    photoCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateMassActionBar);
    });

    function deselectAll() {
        photoCheckboxes.forEach(cb => cb.checked = false);
        selectAll.checked = false;
        updateMassActionBar();
    }

    // Upload Preview Logic
    function updatePreviews(input) {
        const text = document.getElementById('file-count-text');
        const container = document.getElementById('preview-container');
        const defaultUi = document.getElementById('default-upload-ui');
        
        container.innerHTML = '';
        
        if (input.files && input.files.length > 0) {
                    reader.readAsDataURL(file);
                }
            });

            // Special case: if total <= limit, we don't need the +n card.
            // But if we have images and other things? (The prompt only cares about images)
        } else {
            text.innerHTML = 'Drag items here or <span class="text-brand-blue font-semibold">Browse</span>';
            container.classList.add('hidden');
            defaultUi.classList.remove('hidden');
        }
    }
</script>
@endsection

