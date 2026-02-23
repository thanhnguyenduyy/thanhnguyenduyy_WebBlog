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
    
    Route::post('/blog/generate', [BlogPostController::class, 'generateSuggestion'])->name('blog.generate');
    Route::resource('blog', BlogPostController::class);
    Route::resource('projects', ProjectController::class);
    Route::post('/gallery/mass-destroy', [GalleryController::class, 'massDestroy'])->name('gallery.mass-destroy');
    Route::resource('gallery', GalleryController::class);
    Route::resource('gallery-categories', \App\Http\Controllers\Admin\GalleryCategoryController::class);
    Route::post('/inbox/{message}/toggle-read', [InboxController::class, 'toggleRead'])->name('inbox.toggle-read');
    Route::resource('inbox', InboxController::class);
    
    Route::resource('resources', \App\Http\Controllers\Admin\ResourcesController::class);
    Route::resource('timeline', \App\Http\Controllers\Admin\TimelineController::class);
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
});
