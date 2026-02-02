<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InboxController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Real routes instead of placeholders
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    
    Route::post('/blog/generate', [BlogPostController::class, 'generateSuggestion'])->name('blog.generate');
    Route::resource('blog', BlogPostController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('inbox', InboxController::class);
    
    Route::get('/resources', [App\Http\Controllers\Admin\ResourcesController::class, 'index'])->name('resources.index');
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
});
