<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Photo;
use App\Models\ResourceItem;
use App\Models\TimelineItem;
use App\Models\Message;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Home page
     */
    public function home()
    {
        return view('client.pages.home');
    }

    /**
     * About page with timeline
     */
    public function about()
    {
        $timeline = TimelineItem::orderBy('year', 'desc')->get();
        return view('client.pages.about', compact('timeline'));
    }

    /**
     * Blog page with posts
     */
    public function blog()
    {
        $posts = BlogPost::where('status', 'Published')->orderBy('created_at', 'desc')->get();
        return view('client.pages.blog', compact('posts'));
    }

    /**
     * Gallery page with photos
     */
    public function gallery()
    {
        $photos = Photo::all();
        return view('client.pages.gallery', compact('photos'));
    }

    /**
     * Projects page
     */
    public function projects()
    {
        $projects = Project::all();
        return view('client.pages.projects', compact('projects'));
    }

    /**
     * Resources page
     */
    public function resources()
    {
        $resources = ResourceItem::all();
        return view('client.pages.resources', compact('resources'));
    }

    /**
     * Now page
     */
    public function now()
    {
        return view('client.pages.now');
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('client.pages.contact');
    }

    /**
     * Handle contact form submission
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        Message::create($validated);

        return response()->json(['message' => 'Tin nhắn đã được gửi thành công! 🎉']);
    }
}
