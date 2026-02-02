<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            ['label' => 'Total Visits', 'value' => '42.8k', 'change' => '+12.5%', 'trend' => 'up'],
            ['label' => 'Avg. Duration', 'value' => '2m 15s', 'change' => '-2.4%', 'trend' => 'down'],
            ['label' => 'Project Clicks', 'value' => '1,204', 'change' => '+8.2%', 'trend' => 'up'],
        ];

        $chartData = [
            'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            'views' => [4000, 3000, 2000, 2780, 1890, 2390, 3490],
        ];

        return view('admin.dashboard', compact('stats', 'chartData'))
            ->with('title', 'Dashboard')
            ->with('currentViewId', 'dashboard');
    }
}
