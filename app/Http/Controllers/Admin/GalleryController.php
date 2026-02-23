<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Photo::with('galleryCategory');

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('gallery_category_id', $request->category_id);
        }

        $photos = $query->orderBy('created_at', 'desc')->get();
        $categories = GalleryCategory::orderBy('name')->get();
        
        return view('admin.gallery.index', compact('photos', 'categories'))
            ->with('title', 'Photography')
            ->with('currentView', 'Photography')
            ->with('currentViewId', 'gallery');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gallery_category_id' => 'required|exists:gallery_categories,id',
        ]);

        $categoryId = $request->input('gallery_category_id');

        foreach ($request->file('photos') as $file) {
            $path = $file->store('gallery', 'public');
            
            $title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            
            Photo::create([
                'title' => $title,
                'gallery_category_id' => $categoryId,
                'url' => '/storage/' . $path,
                'exif' => 'Auto-extracted',
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', count($request->file('photos')) . ' photos uploaded successfully');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:photos,id'
        ]);

        Photo::whereIn('id', $request->ids)->delete();

        return redirect()->route('admin.gallery.index')->with('success', count($request->ids) . ' photos deleted successfully');
    }

    public function destroy(Photo $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Photo deleted successfully');
    }
}
