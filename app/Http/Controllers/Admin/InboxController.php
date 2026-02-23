<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.inbox.index', compact('messages'))
            ->with('title', 'Inbox')
            ->with('currentViewId', 'contact');
    }

    public function show(Message $inbox)
    {
        $inbox->update(['is_read' => true]);
        return view('admin.inbox.show', ['message' => $inbox])
            ->with('title', 'View Message')
            ->with('currentViewId', 'contact');
    }

    public function toggleRead(Message $message)
    {
        $message->update(['is_read' => !$message->is_read]);
        return back()->with('success', 'Message status updated');
    }

    public function destroy(Message $inbox)
    {
        $inbox->delete();
        return redirect()->route('admin.inbox.index')->with('success', 'Message deleted');
    }
}
