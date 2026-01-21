<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beach;
use Illuminate\Support\Facades\Auth;

class OwnerBeachController extends Controller
{
    /**
     * Show all beaches owned by the logged-in owner
     */
    public function index()
    {
        $beaches = Beach::where('owner_id', Auth::id())->get();

        return view('owner.beaches.index', compact('beaches'));
    }

    /**
     * Show the form to create a new beach
     */
    public function create()
    {
        return view('owner.beaches.create');
    }

    /**
     * Store a new beach (set to pending until admin approval)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'location'    => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('beaches', 'public');
        }

        Beach::create([
            'owner_id'    => Auth::id(),
            'name'        => $request->name,
            'description' => $request->description,
            'location'    => $request->location,
            'image'       => $imagePath,
            'status'      => 'pending', // Require admin approval
        ]);

        return redirect()
            ->route('owner.beaches.index')
            ->with('success', 'Beach submitted for approval!');
    }
}
