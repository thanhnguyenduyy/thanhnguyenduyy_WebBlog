<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ResourceItem;

class ResourcesController extends Controller
{
    public function index()
    {
        $resources = ResourceItem::orderBy('created_at', 'desc')->get();

        return view('admin.resources.index', compact('resources'))
            ->with('title', 'Resources')
            ->with('currentViewId', 'resources');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:PDF,PRESET,CODE,OTHER',
            'url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
        ]);

        ResourceItem::create($validated);

        return redirect()->route('admin.resources.index')->with('success', 'Resource created successfully');
    }

    public function update(Request $request, ResourceItem $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:PDF,PRESET,CODE,OTHER',
            'url' => 'required|url',
            'file_size' => 'nullable|string|max:50',
        ]);

        $resource->update($validated);

        return redirect()->route('admin.resources.index')->with('success', 'Resource updated successfully');
    }

    public function destroy(ResourceItem $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Resource deleted successfully');
    }
}
