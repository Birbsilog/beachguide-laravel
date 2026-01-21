<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beach;

class BeachController extends Controller
{
    /**
     * List all beaches grouped by status.
     */
    public function index()
    {
        $approvedBeaches = Beach::approved()->with(['owner', 'amenities'])->get();
        $pendingBeaches  = Beach::pending()->with(['owner', 'amenities'])->get();
        $deniedBeaches   = Beach::denied()->with(['owner', 'amenities'])->get();

        return view('admin.beaches.index', compact(
            'approvedBeaches',
            'pendingBeaches',
            'deniedBeaches'
        ));
    }

    /**
     * Approve a beach submission.
     */
    public function approve(Beach $beach)
    {
        $beach->update(['status' => Beach::STATUS_APPROVED]);

        return back()->with('success', "{$beach->name} has been approved!");
    }

    /**
     * Deny a beach submission.
     */
    public function deny(Beach $beach)
    {
        $beach->update(['status' => Beach::STATUS_DENIED]);

        return back()->with('success', "{$beach->name} has been denied.");
    }

    /**
     * Dashboard summary.
     */
    public function dashboard()
    {
        $pendingCount  = Beach::pending()->count();
        $approvedCount = Beach::approved()->count();
        $deniedCount   = Beach::denied()->count();

        $recentBeaches = Beach::latest()->with('owner')->take(5)->get();

        return view('admin.dashboard', compact(
            'pendingCount',
            'approvedCount',
            'deniedCount',
            'recentBeaches'
        ));
    }

    /**
     * Show detailed information for a submitted beach.
     */
    public function show($id)
    {
        $beach = Beach::with(['owner', 'amenities'])->findOrFail($id);

        return view('admin.beaches.show', compact('beach'));
    }
}
