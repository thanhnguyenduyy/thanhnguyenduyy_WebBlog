<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Traits\FileCleanupTrait;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use FileCleanupTrait;

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $projects = Project::orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
            
        return view('admin.projects.index', compact('projects'))
            ->with('title', 'IT Projects')
            ->with('currentViewId', 'projects');
    }

    public function create()
    {
        return view('admin.projects.form')
            ->with('title', 'New Project')
            ->with('currentViewId', 'projects');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:projects,slug',
            'description' => 'nullable|string',
            'tech_stack' => 'nullable|array',
            'link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'status' => 'required|in:Completed,In Progress,Archived',
            'is_featured' => 'nullable',
            'image_url' => 'nullable|string', // URL or Path
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            $path = $this->imageService->optimizeAndStore($request->file('image'), 'projects', 1200);
            $validated['image_url'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['tech_stack'] = $request->input('tech_stack', []);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'))
            ->with('title', 'Edit Project')
            ->with('currentViewId', 'projects');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:projects,slug,' . $project->id,
            'description' => 'nullable|string',
            'tech_stack' => 'nullable|array',
            'link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'status' => 'required|in:Completed,In Progress,Archived',
            'is_featured' => 'nullable',
            'image_url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            // Delete old image
            $this->deleteOldFile($project->image_url);
            
            $path = $this->imageService->optimizeAndStore($request->file('image'), 'projects', 1200);
            $validated['image_url'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['tech_stack'] = $request->input('tech_stack', []);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $this->deleteOldFile($project->image_url);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
