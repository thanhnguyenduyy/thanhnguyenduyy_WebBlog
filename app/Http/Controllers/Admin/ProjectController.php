<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
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
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
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
            // Option: delete old image if it exists in storage
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['tech_stack'] = $request->input('tech_stack', []);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
