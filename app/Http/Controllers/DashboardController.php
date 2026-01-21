<?php

namespace App\Http\Controllers;

use App\Models\Beach;
use App\Models\Inquiry;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $ownerId = Auth::id(); // logged in beach owner id

        // Count beaches owned by this user
        $beachesCount = Beach::where('owner_id', $ownerId)->count();

        // Count inquiries assigned to this owner
        $inquiriesCount = Inquiry::where('owner_id', $ownerId)->count();

        // Count reviews for this owner's beaches
        $reviewsCount = Review::whereHas('beach', function($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->count();

        return view('owner.dashboard', compact('beachesCount', 'inquiriesCount', 'reviewsCount'));
    }
}
