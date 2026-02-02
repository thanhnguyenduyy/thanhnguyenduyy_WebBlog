<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile')
            ->with('title', 'Profile & Story')
            ->with('currentViewId', 'profile');
    }

    public function update(Request $request)
    {
        // Logic to update profile would go here
        return back()->with('success', 'Profile updated successfully!');
    }
}
