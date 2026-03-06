<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Photo;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            ['label' => 'Blog Posts', 'value' => BlogPost::count(), 'icon' => 'book'],
            ['label' => 'Projects', 'value' => Project::count(), 'icon' => 'briefcase'],
            ['label' => 'Photos', 'value' => Photo::count(), 'icon' => 'camera'],
            ['label' => 'Unread Messages', 'value' => Message::where('is_read', false)->count(), 'icon' => 'mail'],
        ];

        $recentMessages = Message::latest()->take(3)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'))
            ->with('title', 'Dashboard')
            ->with('currentViewId', 'dashboard');
    }
}
