@extends('layouts.admin', ['currentView' => 'Photography'])

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Photography</h2>
            <p class="text-zinc-500 text-sm mt-1">Manage your visual storytelling through the lens.</p>
        </div>
        <button onclick="document.getElementById('upload-modal').classList.remove('hidden')" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-4 py-2 rounded-lg font-medium hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
            Upload Photo
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($photos as $photo)
        <div class="group relative aspect-square bg-zinc-200 dark:bg-zinc-800 rounded-lg overflow-hidden border border-zinc-200 dark:border-brand-border">
            <img src="{{ $photo->url }}" alt="{{ $photo->title }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500">
            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-between p-4">
                <div class="flex justify-end">
                    <form action="{{ route('admin.gallery.destroy', $photo) }}" method="POST" onsubmit="return confirm('Delete this photo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-400 hover:text-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </form>
                </div>
                <div>
                    <h4 class="text-white font-medium text-sm truncate">{{ $photo->title }}</h4>
                    <p class="text-zinc-400 text-[10px] uppercase tracking-widest">{{ $photo->category }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Simple Upload Modal (Normally would be a separate view or a robust component) -->
<div id="upload-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-2xl w-full max-w-md p-8 shadow-2xl animate-in">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-serif text-zinc-900 dark:text-white">Add New Photo</h3>
            <button onclick="document.getElementById('upload-modal').classList.add('hidden')" class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <form action="{{ route('admin.gallery.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Title</label>
                <input type="text" name="title" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Category</label>
                <select name="category" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue">
                    <option value="STREET">Street</option>
                    <option value="PORTRAIT">Portrait</option>
                    <option value="TRAVEL">Travel</option>
                    <option value="MINIMAL">Minimal</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">Image URL</label>
                <input type="url" name="url" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">EXIF (Optional)</label>
                <input type="text" name="exif" placeholder="ISO 100 · 35mm · f/1.8" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-2 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-brand-blue">
            </div>
            <button type="submit" class="w-full bg-brand-blue text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition-colors mt-2">Upload Photo</button>
        </form>
    </div>
</div>
@endsection
