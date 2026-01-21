<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        // Get all reviews for the beaches owned by the current user
        $owner = Auth::user();
        $reviews = Review::with('beach', 'user')
            ->whereHas('beach', function ($query) use ($owner) {
                $query->where('owner_id', $owner->id);
            })
            ->latest()
            ->get();

        return view('owner.reviews.index', compact('reviews'));
    }
}
