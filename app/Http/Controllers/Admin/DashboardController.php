<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beach;

class DashboardController extends Controller
{
    public function index()
    {
        // counts by status (uses scopes we add below)
        $pendingCount  = Beach::pending()->count();
        $approvedCount = Beach::approved()->count();
        $deniedCount   = Beach::denied()->count();

        // some recent beaches (include owner relation)
        $recentBeaches = Beach::with('owner')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'pendingCount',
            'approvedCount',
            'deniedCount',
            'recentBeaches'
        ));
    }
}
