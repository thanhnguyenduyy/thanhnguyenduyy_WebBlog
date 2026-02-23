@extends('layouts.admin', ['currentView' => 'Photography'])

@section('content')
<div class="px-8 py-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
        <div>
            <h1 class="text-3xl font-serif text-zinc-900 dark:text-white leading-tight">Gallery Categories</h1>
            <p class="text-zinc-500 text-sm mt-2 flex items-center">
                <span class="w-8 h-[1px] bg-brand-blue/30 mr-3"></span>
                Organize your photography into dynamic collections.
            </p>
        </div>
        <button onclick="document.getElementById('create-category-modal').classList.remove('hidden')" class="bg-brand-blue hover:bg-brand-blue-dark text-white px-6 py-3 rounded-xl text-sm font-bold uppercase tracking-widest transition-all shadow-lg shadow-brand-blue/20 flex items-center group">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-2 group-hover:rotate-90 transition-transform"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Category
        </button>
    </div>

    @if(session('success'))
    <div class="mb-8 p-4 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-100 dark:border-emerald-500/20 rounded-xl text-emerald-600 dark:text-emerald-400 text-sm flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="20 6 9 17 4 12"></polyline></svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl p-6 hover:shadow-xl hover:shadow-zinc-200/50 dark:hover:shadow-none transition-all group">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-zinc-50 dark:bg-zinc-800/50 rounded-xl flex items-center justify-center text-brand-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="editCategory({{ json_encode($category) }})" class="p-2 text-zinc-400 hover:text-brand-blue hover:bg-zinc-50 dark:hover:bg-zinc-800 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </button>
                    <form action="{{ route('admin.gallery-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Sửa sạch Category này có thể làm ảnh hưởng đến các ảnh liên quan. Bạn chắc chắn chứ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-zinc-400 hover:text-rose-500 hover:bg-zinc-50 dark:hover:bg-zinc-800 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </form>
                </div>
            </div>
            <h3 class="text-lg font-serif text-zinc-900 dark:text-white mb-1">{{ $category->name }}</h3>
            <p class="text-xs text-zinc-400 uppercase tracking-widest font-bold mb-3">{{ $category->photos_count }} Photos</p>
            <p class="text-zinc-500 text-sm line-clamp-2 italic">{{ $category->description ?? 'No description provided.' }}</p>
        </div>
        @endforeach
    </div>
</div>

<!-- Create Modal -->
<div id="create-category-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl w-full max-w-md p-8 shadow-2xl animate-in fade-in zoom-in duration-300">
        <h3 class="text-xl font-serif text-zinc-900 dark:text-white mb-6">Create New Category</h3>
        <form action="{{ route('admin.gallery-categories.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Category Name</label>
                <input type="text" name="name" required class="w-full bg-zinc-50 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700 rounded-xl px-4 py-3 text-zinc-900 dark:text-white focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition-all outline-none" placeholder="e.g., Street Photography">
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full bg-zinc-50 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700 rounded-xl px-4 py-3 text-zinc-900 dark:text-white focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition-all outline-none resize-none" placeholder="A brief description of this category..."></textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="document.getElementById('create-category-modal').classList.add('hidden')" class="px-6 py-3 text-sm font-bold text-zinc-500 hover:text-zinc-900 dark:hover:text-white transition-colors uppercase tracking-widest">Cancel</button>
                <button type="submit" class="bg-brand-blue hover:bg-brand-blue-dark text-white px-8 py-3 rounded-xl text-sm font-bold uppercase tracking-widest transition-all shadow-lg shadow-brand-blue/20">Create Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="edit-category-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl w-full max-w-md p-8 shadow-2xl animate-in fade-in zoom-in duration-300">
        <h3 class="text-xl font-serif text-zinc-900 dark:text-white mb-6">Edit Category</h3>
        <form id="edit-category-form" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Category Name</label>
                <input type="text" id="edit-name" name="name" required class="w-full bg-zinc-50 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700 rounded-xl px-4 py-3 text-zinc-900 dark:text-white focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition-all outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Description</label>
                <textarea id="edit-description" name="description" rows="3" class="w-full bg-zinc-50 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700 rounded-xl px-4 py-3 text-zinc-900 dark:text-white focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition-all outline-none resize-none"></textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="document.getElementById('edit-category-modal').classList.add('hidden')" class="px-6 py-3 text-sm font-bold text-zinc-500 hover:text-zinc-900 dark:hover:text-white transition-colors uppercase tracking-widest">Cancel</button>
                <button type="submit" class="bg-brand-blue hover:bg-brand-blue-dark text-white px-8 py-3 rounded-xl text-sm font-bold uppercase tracking-widest transition-all shadow-lg shadow-brand-blue/20">Save Changes</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function editCategory(category) {
        const modal = document.getElementById('edit-category-modal');
        const form = document.getElementById('edit-category-form');
        const nameInput = document.getElementById('edit-name');
        const descInput = document.getElementById('edit-description');

        form.action = `/admin/gallery-categories/${category.id}`;
        nameInput.value = category.name;
        descInput.value = category.description || '';

        modal.classList.remove('hidden');
    }
</script>
@endpush
@endsection
