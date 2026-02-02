<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        // Mock data for now to match the UI
        $resources = [
            ['id' => '1', 'title' => 'Minimalist Lightroom Presets', 'description' => 'A pack of 5 presets for urban photography.', 'type' => 'PRESET', 'downloads' => 1240, 'fileSize' => '2.4 MB'],
            ['id' => '2', 'title' => 'React Admin Boilerplate', 'description' => 'Clean dashboard starter with Tailwind.', 'type' => 'CODE', 'downloads' => 856, 'fileSize' => '1.1 MB'],
            ['id' => '3', 'title' => 'Design System Checklist', 'description' => 'PDF guide for product designers.', 'type' => 'PDF', 'downloads' => 3421, 'fileSize' => '500 KB'],
        ];

        return view('admin.resources.index', compact('resources'))
            ->with('title', 'Resources')
            ->with('currentViewId', 'resources');
    }
}
