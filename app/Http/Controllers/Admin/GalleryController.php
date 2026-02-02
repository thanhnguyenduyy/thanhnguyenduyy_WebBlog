<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Album;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('photos'))
            ->with('title', 'Photography')
            ->with('currentViewId', 'gallery');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:STREET,PORTRAIT,TRAVEL,MINIMAL',
            'url' => 'required|url',
            'exif' => 'nullable|string',
        ]);

        Photo::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo added successfully');
    }

    public function destroy(Photo $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Photo deleted successfully');
    }
}
