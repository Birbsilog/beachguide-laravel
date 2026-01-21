<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class OwnerDashboardController extends Controller
{
    public function index()
{
    $ownerId = Auth::id();

    // Get all beach IDs owned by this owner
    $beachIds = \App\Models\Beach::where('owner_id', $ownerId)->pluck('id');

    // Inquiries for beaches owned by this owner
    $inquiries = Inquiry::with(['user', 'beach'])
        ->whereIn('beach_id', $beachIds)
        ->latest()
        ->get();

    // Reviews for beaches owned by this owner
    $reviews = Review::with(['user', 'beach'])
        ->whereIn('beach_id', $beachIds)
        ->latest()
        ->get();

    // Dashboard stats
    $counts = [
        'beaches'   => $beachIds->count(),
        'inquiries' => $inquiries->count(),
        'reviews'   => $reviews->count(),
    ];

    return view('owner.dashboard', compact('inquiries', 'reviews', 'counts'));
}

}
