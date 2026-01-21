<?php

namespace App\Http\Controllers;

use App\Models\Beach;

class ExploreController extends Controller
{
    public function index()
{
    $beaches = Beach::where('status', Beach::STATUS_APPROVED)
        ->with('amenities', 'owner')
        ->get();

    return view('explore', compact('beaches'));
}

}
