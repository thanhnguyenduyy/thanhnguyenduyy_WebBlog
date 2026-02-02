<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings')
            ->with('title', 'Settings')
            ->with('currentViewId', 'settings');
    }
}
