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
            'description' => 'nullable|string',
            'tech_stack' => 'nullable|array',
            'link' => 'nullable|url',
            'image_url' => 'nullable|url',
        ]);

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
            'description' => 'nullable|string',
            'tech_stack' => 'nullable|array',
            'link' => 'nullable|url',
            'image_url' => 'nullable|url',
        ]);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
