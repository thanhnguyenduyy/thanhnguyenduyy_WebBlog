<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\GalleryCategory;
use App\Traits\FileCleanupTrait;
use App\Services\ImageService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use FileCleanupTrait;

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
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
            $path = $this->imageService->optimizeAndStore($file, 'gallery', 1600); // Higher res for gallery
            
            $title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            
            Photo::create([
                'title' => $title,
                'gallery_category_id' => $categoryId,
                'url' => $path,
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

        $photos = Photo::whereIn('id', $request->ids)->get();
        foreach ($photos as $photo) {
            $this->deleteOldFile($photo->url);
        }
        
        Photo::whereIn('id', $request->ids)->delete();

        return redirect()->route('admin.gallery.index', ['category_id' => $request->category_id])
            ->with('success', count($request->ids) . ' photos deleted successfully');
    }

    public function destroy(Request $request, Photo $gallery)
    {
        $this->deleteOldFile($gallery->url);
        $gallery->gallery_category_id = $gallery->gallery_category_id; // Just for clarity
        $gallery->delete();
        return redirect()->route('admin.gallery.index', ['category_id' => $request->category_id])
            ->with('success', 'Photo deleted successfully');
    }
}
