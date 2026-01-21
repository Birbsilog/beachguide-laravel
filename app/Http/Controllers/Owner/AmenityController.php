<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Beach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AmenityController extends Controller
{
    public function store(Request $request, $beach_id)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $images = [];

        // If single file uploaded (input name 'image'), store it then save JSON array
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('amenities', 'public');
            $images[] = $path;
        }

        Amenity::create([
            'beach_id' => $beach_id,
            'description' => $validated['description'],
            // save JSON array (casts in model will convert if set)
            'images' => $images ? json_encode($images) : json_encode([]),
        ]);

        return redirect()->back()->with('success', 'Amenity added successfully!');
    }

  public function update(Request $request, Amenity $amenity)
{
    $validated = $request->validate([
        'description' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
    ]);

    $amenity->description = $validated['description'];

    // decode current images
    $existing = is_array($amenity->images)
        ? $amenity->images
        : (json_decode($amenity->images, true) ?? []);

    // if a new file is uploaded, replace the old one
    if ($request->hasFile('image')) {
        // delete old images
        foreach ($existing as $oldPath) {
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // upload new image
        $path = $request->file('image')->store('amenities', 'public');
        $existing = [$path];
    }

    // save as JSON
    $amenity->images = json_encode($existing);
    $amenity->save();

    return redirect()->back()->with('success', 'Amenity updated successfully!');
}

    public function destroy(Beach $beach, Amenity $amenity)
    {
        if ($amenity->beach_id !== $beach->id) {
            abort(403, 'Unauthorized action.');
        }

        // delete stored images
        $images = $amenity->images ?? [];
        if (!is_array($images)) {
            $images = json_decode($images, true) ?: [];
        }

        foreach ($images as $img) {
            if ($img && Storage::disk('public')->exists($img)) {
                Storage::disk('public')->delete($img);
            }
        }

        $amenity->delete();

        return back()->with('success', 'Amenity deleted successfully!');
    }
}
