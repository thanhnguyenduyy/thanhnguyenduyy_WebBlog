<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        return view('admin.blog.index', compact('posts'))
            ->with('title', 'Journal')
            ->with('currentViewId', 'blog');
    }

    public function create()
    {
        return view('admin.blog.form')
            ->with('title', 'New Journal Entry')
            ->with('currentViewId', 'blog');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_posts,slug',
            'category' => 'required|in:IT,PHOTOGRAPHY,THOUGHTS',
            'status' => 'required|in:Published,Draft',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image_url' => 'nullable|url',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'reading_time' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        }

        if ($validated['status'] === 'Published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $validated['is_featured'] = $request->has('is_featured');

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Entry created successfully');
    }

    public function edit(BlogPost $blog)
    {
        $post = $blog;
        return view('admin.blog.form', compact('post'))
            ->with('title', 'Edit Entry')
            ->with('currentViewId', 'blog');
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_posts,slug,' . $blog->id,
            'category' => 'required|in:IT,PHOTOGRAPHY,THOUGHTS',
            'status' => 'required|in:Published,Draft',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image_url' => 'nullable|url',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'reading_time' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        }

        if ($validated['status'] === 'Published' && empty($blog->published_at) && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $validated['is_featured'] = $request->has('is_featured');

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Entry updated successfully');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Entry deleted successfully');
    }

    public function generateSuggestion(Request $request)
    {
        $title = $request->input('title');
        // This would call the GeminiService
        // For now, return a placeholder
        return response()->json([
            'suggestion' => "AI Suggestion for: $title. This is a deep dive into the technical and creative aspects of the subject."
        ]);
    }
}
