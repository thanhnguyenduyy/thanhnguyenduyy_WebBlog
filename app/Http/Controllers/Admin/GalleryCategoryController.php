<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::withCount('photos')->orderBy('name')->get();
        return view('admin.gallery_categories.index', compact('categories'))
            ->with('title', 'Gallery Categories')
            ->with('currentView', 'Gallery Categories')
            ->with('currentViewId', 'gallery_categories');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:gallery_categories',
            'description' => 'nullable|string',
        ]);

        GalleryCategory::create($validated);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category created successfully');
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:gallery_categories,name,' . $galleryCategory->id,
            'description' => 'nullable|string',
        ]);

        $galleryCategory->update($validated);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category deleted successfully');
    }
}
