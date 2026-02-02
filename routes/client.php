<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PageController;

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
|
| Routes for the public-facing client website.
|
*/

Route::name('client.')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/blog', [PageController::class, 'blog'])->name('blog');
    Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
    Route::get('/projects', [PageController::class, 'projects'])->name('projects');
    Route::get('/resources', [PageController::class, 'resources'])->name('resources');
    Route::get('/now', [PageController::class, 'now'])->name('now');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'sendMessage'])->name('contact.send');
});
