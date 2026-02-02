@extends('layouts.admin', ['currentView' => 'settings'])

@section('content')
<div class="space-y-8 max-w-3xl animate-in">
    <div>
        <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Settings</h2>
        <p class="text-zinc-500 text-sm mt-1">Configuration for SEO, Domain, and Admin preferences.</p>
    </div>

    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl overflow-hidden shadow-sm dark:shadow-none">
        <div class="p-6 border-b border-zinc-200 dark:border-brand-border/50">
            <h3 class="text-lg font-medium text-zinc-900 dark:text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-brand-blue"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                General Site Info
            </h3>
        </div>
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Site Title</label>
                    <input type="text" value="thanhnguyenduyy" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Footer Copyright</label>
                    <input type="text" value="© 2024 Nguyễn Duy Thanh" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-900 dark:text-white focus:border-brand-blue focus:outline-none transition-colors">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">SEO Description</label>
                <textarea rows="3" class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-lg p-3 text-zinc-700 dark:text-zinc-300 focus:border-brand-blue focus:outline-none transition-colors resize-none">Personal portfolio of Nguyễn Duy Thanh, featuring fullstack development projects and street photography.</textarea>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border rounded-xl overflow-hidden shadow-sm dark:shadow-none">
        <div class="p-6 border-b border-zinc-200 dark:border-brand-border/50">
            <h3 class="text-lg font-medium text-zinc-900 dark:text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-green-600"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Security & Access
            </h3>
        </div>
        <div class="p-6 space-y-4">
             <div class="flex items-center justify-between py-2">
                <div>
                    <p class="text-zinc-900 dark:text-white font-medium">Public Access</p>
                    <p class="text-zinc-500 text-xs">Is the portfolio visible to the world?</p>
                </div>
                <div class="w-12 h-6 rounded-full bg-brand-blue relative cursor-pointer">
                    <div class="absolute top-1 right-1 w-4 h-4 bg-white rounded-full"></div>
                </div>
             </div>
             <div class="flex items-center justify-between py-2 border-t border-zinc-200 dark:border-zinc-800">
                <div>
                    <p class="text-zinc-900 dark:text-white font-medium">Maintenance Mode</p>
                    <p class="text-zinc-500 text-xs">Show a "Coming Soon" screen.</p>
                </div>
                <div class="w-12 h-6 rounded-full bg-zinc-300 dark:bg-zinc-700 relative cursor-pointer">
                    <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full"></div>
                </div>
             </div>
        </div>
    </div>
    
    <div class="flex justify-end">
        <button class="bg-zinc-900 dark:bg-white text-white dark:text-black font-bold py-3 px-8 rounded-lg hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors">
            Save Changes
        </button>
    </div>
</div>
@endsection
