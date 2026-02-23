<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineItem;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timeline = TimelineItem::orderBy('year', 'desc')->orderBy('created_at', 'desc')->get();
        return view('admin.timeline.index', compact('timeline'))
            ->with('title', 'Timeline')
            ->with('currentViewId', 'timeline');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:IT,PHOTO,LIFE,CAREER',
        ]);

        TimelineItem::create($validated);

        return redirect()->route('admin.timeline.index')->with('success', 'Timeline item added successfully');
    }

    public function update(Request $request, TimelineItem $timeline)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:IT,PHOTO,LIFE,CAREER',
        ]);

        $timeline->update($validated);

        return redirect()->route('admin.timeline.index')->with('success', 'Timeline item updated successfully');
    }

    public function destroy(TimelineItem $timeline)
    {
        $timeline->delete();
        return redirect()->route('admin.timeline.index')->with('success', 'Timeline item deleted successfully');
    }
}
