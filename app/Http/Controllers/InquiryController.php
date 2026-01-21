<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Beach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    // Show inquiries for the logged-in owner
    public function index()
    {
        $ownerId = Auth::id();

        $inquiries = Inquiry::with(['user', 'beach'])
            ->where('owner_id', $ownerId)
            ->latest()
            ->get();

        return view('owner.inquiries.index', compact('inquiries'));
    }

    // Store a new inquiry
    public function store(Request $request, $beachId)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $beach = Beach::findOrFail($beachId);

        Inquiry::create([
            'beach_id' => $beach->id,
            'user_id'  => Auth::id(),         // the logged-in tourist
            'owner_id' => $beach->owner_id,   // owner of the beach
            'subject'  => $request->subject,
            'message'  => $request->message,
            'status'   => 'pending',
        ]);

        return redirect()->back()->with('success', 'Inquiry sent successfully!');
    }

    // Optional: Update inquiry status (for owners)
    public function updateStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $request->validate([
            'status' => 'required|string|in:pending,resolved,closed',
        ]);

        $inquiry->status = $request->status;
        $inquiry->save();

        return redirect()->back()->with('success', 'Inquiry status updated!');
    }
}
