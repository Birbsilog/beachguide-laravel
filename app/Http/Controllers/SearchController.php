<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beach;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // If no query, redirect back
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a beach name.');
        }

        // Find first matching approved beach
        $beach = Beach::where('name', 'LIKE', "%{$query}%")
            ->where('status', Beach::STATUS_APPROVED)
            ->first();

        if ($beach) {
            // Redirect directly to the beach’s details page
            return redirect()->route('beaches.show', $beach->id);
        }

        // If not found
        return redirect()->back()->with('error', 'No beach found matching your search.');
    }
}
