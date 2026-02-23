@extends('layouts.admin', ['currentView' => 'Settings'])

@section('content')
@php
    $usageMap = [
        'site_name' => ['Navbar', 'SEO Title'],
        'site_description' => ['SEO Meta'],
        'contact_email' => ['Contact Page', 'Footer'],
        'display_name' => ['Home', 'About', 'Footer'],
        'primary_slogan' => ['Home Header'],
        'short_bio' => ['Admin Dashboard'],
        'about_quote' => ['About Hero'],
        'technologist_bio' => ['About (Section 01)'],
        'observer_bio' => ['About (Section 02)'],
        'social_github' => ['Contact', 'Social Links'],
        'social_instagram' => ['Contact', 'Social Links'],
        'social_facebook' => ['Contact', 'Social Links'],
        'footer_quote' => ['Footer'],
        'site_logo' => ['Navbar'],
        'site_avatar' => ['Home', 'About'],
        'site_favicon' => ['Browser Tab'],
    ];
@endphp

<div class="animate-in space-y-6 pb-20">
    <!-- ... header remains same ... -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-2">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white">Site Settings</h2>
            <p class="text-zinc-500 text-sm mt-1">Configure global identity and track content locations across the site.</p>
        </div>
        
        <div class="flex items-center gap-4">
            <!-- Navigation Tabs -->
            <div class="flex bg-white dark:bg-zinc-900 p-1 rounded-xl border border-zinc-200 dark:border-brand-border shrink-0 shadow-sm">
                @foreach($settings as $group => $items)
                    <button 
                        type="button"
                        onclick="switchTab('{{ $group }}')"
                        data-tab-btn="{{ $group }}"
                        class="tab-btn px-4 py-2 text-[10px] font-bold uppercase tracking-widest rounded-lg transition-all {{ $loop->first ? 'bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black font-bold' : 'text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300' }}"
                    >
                        {{ $group }}
                    </button>
                @endforeach
            </div>

            <button type="submit" form="settings-form" class="flex items-center bg-zinc-900 dark:bg-zinc-100 text-white dark:text-black px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-zinc-800 dark:hover:bg-zinc-200 transition-all shadow-lg active:scale-95 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-2 opacity-70 group-hover:rotate-12 transition-transform"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                Save
            </button>
        </div>
    </div>

    @if($errors->any())
    <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-xl flex items-center mb-6 animate-in">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 shrink-0"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <span class="text-sm font-medium">Some settings are invalid. Please check the underlined fields.</span>
    </div>
    @endif

    <form id="settings-form" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="relative">
            @foreach($settings as $group => $items)
            <div id="tab-{{ $group }}" class="tab-content {{ $loop->first ? '' : 'hidden' }} animate-in fade-in duration-300">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($items as $setting)
                    <div class="bg-white dark:bg-brand-panel border {{ $errors->has($setting->key) ? 'border-red-500' : 'border-zinc-200 dark:border-brand-border' }} rounded-xl p-6 hover:border-brand-blue/30 transition-all group/card shadow-sm dark:shadow-none flex flex-col">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <label class="block text-sm font-bold {{ $errors->has($setting->key) ? 'text-red-500' : 'text-zinc-900 dark:text-white' }} leading-tight">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                                <div class="flex flex-wrap gap-1 mt-2">
                                    @foreach($usageMap[$setting->key] ?? ['General'] as $location)
                                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-bold bg-zinc-50 dark:bg-zinc-900 text-zinc-400 border border-zinc-100 dark:border-zinc-800">
                                            {{ $location }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <span class="text-[9px] font-mono text-zinc-300 group-hover/card:text-zinc-500 transition-colors">{{ $setting->key }}</span>
                        </div>

                        <div class="flex-1 flex flex-col justify-center">
                            @php
                                $isTallField = in_array($setting->key, ['about_quote', 'technologist_bio', 'observer_bio']);
                                $isRequired = !in_array($setting->key, ['social_github', 'social_instagram', 'social_facebook', 'site_logo', 'site_avatar', 'site_favicon']);
                                $inputType = $setting->type;
                                if ($setting->key === 'contact_email') $inputType = 'email';
                            @endphp

                            @if($setting->type === 'textarea')
                                <textarea 
                                    name="{{ $setting->key }}" 
                                    rows="{{ $isTallField ? '12' : '4' }}" 
                                    {{ $isRequired ? 'required' : '' }}
                                    class="w-full bg-zinc-50/50 dark:bg-zinc-900/50 border {{ $errors->has($setting->key) ? 'border-red-500 ring-1 ring-red-500/20' : 'border-zinc-200 dark:border-brand-border' }} rounded-lg p-3 text-sm text-zinc-900 dark:text-zinc-100 focus:outline-none focus:ring-1 focus:ring-brand-blue/50 focus:border-brand-blue transition-all resize-none">{{ old($setting->key, $setting->value) }}</textarea>
                            @elseif($setting->type === 'file')
                                <div class="space-y-4">
                                    <div class="relative w-full aspect-square md:aspect-video rounded-xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 flex items-center justify-center group-hover/card:border-brand-blue/20 transition-all">
                                        @if($setting->value)
                                            <img src="{{ $setting->value }}" class="w-full h-full object-cover preview-{{ $setting->key }}" id="preview-{{ $setting->key }}">
                                        @else
                                            <div class="text-zinc-400 text-xs flex flex-col items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-2 opacity-50"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                <span>No image set</span>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity flex items-center justify-center">
                                            <label for="file-{{ $setting->key }}" class="cursor-pointer bg-white text-zinc-900 px-4 py-2 rounded-lg text-xs font-bold hover:bg-zinc-100 transition-colors">Change Image</label>
                                        </div>
                                    </div>
                                    <input 
                                        type="file" 
                                        id="file-{{ $setting->key }}"
                                        name="{{ $setting->key }}" 
                                        class="hidden"
                                        onchange="previewImage(this, 'preview-{{ $setting->key }}')"
                                        accept="image/*{{ $setting->key === 'site_favicon' ? ',.ico' : '' }}"
                                    >
                                    <p class="text-[10px] text-zinc-400 italic">Click "Change Image" to upload a new file.</p>
                                </div>
                            @else
                                <input 
                                    type="{{ $inputType === 'url' ? 'url' : ($inputType === 'email' ? 'email' : 'text') }}" 
                                    name="{{ $setting->key }}" 
                                    value="{{ old($setting->key, $setting->value) }}" 
                                    {{ $isRequired ? 'required' : '' }}
                                    class="w-full bg-zinc-50/50 dark:bg-zinc-900/50 border {{ $errors->has($setting->key) ? 'border-red-500 ring-1 ring-red-500/20' : 'border-zinc-200 dark:border-brand-border' }} rounded-lg p-3 text-sm text-zinc-900 dark:text-zinc-100 focus:outline-none focus:ring-1 focus:ring-brand-blue/50 focus:border-brand-blue transition-all"
                                >
                            @endif
                            @error($setting->key)
                                <p class="text-red-500 text-[10px] mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </form>
</div>

<script>
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                if (preview) {
                    preview.src = e.target.result;
                } else {
                    // Create preview if it doesn't exist
                    const container = input.parentElement.querySelector('.relative');
                    container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover" id="${previewId}">`;
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function switchTab(groupId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        const targetTab = document.getElementById('tab-' + groupId);
        if (targetTab) targetTab.classList.remove('hidden');
        
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-zinc-900', 'dark:bg-zinc-100', 'text-white', 'dark:text-black');
            btn.classList.add('text-zinc-400');
        });
        
        const activeBtn = document.querySelector(`[data-tab-btn="${groupId}"]`);
        if (activeBtn) {
            activeBtn.classList.add('bg-zinc-900', 'dark:bg-zinc-100', 'text-white', 'dark:text-black');
            activeBtn.classList.remove('text-zinc-400');
        }
    }

    // Auto-switch to tab with errors on load
    document.addEventListener('DOMContentLoaded', () => {
        const firstErrorField = document.querySelector('.border-red-500');
        if (firstErrorField) {
            const tabContent = firstErrorField.closest('.tab-content');
            if (tabContent) {
                const groupId = tabContent.id.replace('tab-', '');
                switchTab(groupId);
            }
        }
    });
</script>
@endsection
