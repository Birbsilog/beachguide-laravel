<?php

namespace App\Http\Controllers;

use App\Models\Beach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeachController extends Controller
{
    /* =======================
     *  OWNER BEACH LIST
     * ======================= */
    public function index()
    {
        $beaches = Beach::where('owner_id', Auth::id())
            ->with('amenities')
            ->get();

        return view('owner.beaches.index', compact('beaches'));
    }

    public function create()
    {
        return view('owner.beaches.create');
    }

    /* =======================
     *  STORE BEACH
     * ======================= */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'amenities.*.description' => 'nullable|string',
            'amenities.*.images.*'    => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $beach = new Beach([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'latitude'    => $validated['latitude'] ?? null,
            'longitude'   => $validated['longitude'] ?? null,
        ]);

        $beach->owner_id = Auth::id();
        $beach->status   = Beach::STATUS_PENDING;

        if ($request->hasFile('image')) {
            $beach->image_path = $request->file('image')->store('beaches', 'public');
        }

        $beach->save();

        /* --- Amenities --- */
        if ($request->has('amenities')) {
            foreach ($request->amenities as $amenityData) {
                $images = [];

                if (!empty($amenityData['images'])) {
                    foreach ($amenityData['images'] as $file) {
                        $images[] = $file->store('amenities', 'public');
                    }
                }

                $beach->amenities()->create([
                    'description' => $amenityData['description'] ?? null,
                    'images'      => json_encode($images),
                ]);
            }
        }

        return redirect()
            ->route('owner.beaches.index')
            ->with('success', 'Beach submitted for approval!');
    }

    /* =======================
     *  EDIT BEACH
     * ======================= */
    public function edit(Beach $beach)
    {
        $this->authorizeOwner($beach);

        return view('owner.beaches.edit', compact('beach'));
    }

    /* =======================
     *  UPDATE BEACH
     * ======================= */
    public function update(Request $request, Beach $beach)
    {
        $this->authorizeOwner($beach);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'latitude'    => 'required|numeric',
            'longitude'   => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $beach->update($validated);

        if ($request->hasFile('image')) {
            if ($beach->image_path && Storage::exists('public/' . $beach->image_path)) {
                Storage::delete('public/' . $beach->image_path);
            }

            $beach->image_path = $request->file('image')->store('beaches', 'public');
            $beach->save();
        }

        return redirect()
            ->route('owner.beaches.edit', $beach)
            ->with('success', 'Beach updated successfully!');
    }

    /* =======================
     *  DELETE BEACH
     * ======================= */
    public function destroy(Beach $beach)
    {
        $this->authorizeOwner($beach);

        if ($beach->image_path && Storage::exists('public/' . $beach->image_path)) {
            Storage::delete('public/' . $beach->image_path);
        }

        foreach ($beach->amenities as $amenity) {
            $images = json_decode($amenity->images, true) ?? [];
            foreach ($images as $img) {
                if (Storage::exists('public/' . $img)) {
                    Storage::delete('public/' . $img);
                }
            }
            $amenity->delete();
        }

        $beach->delete();

        return redirect()
            ->route('owner.beaches.index')
            ->with('success', 'Beach deleted successfully!');
    }

    /* =======================
     *  PUBLIC BEACH VIEW
     * ======================= */
    public function show(Beach $beach)
    {
        $beach->load('amenities', 'reviews.user');

        $reviewsCount  = $beach->reviews->count();
        $averageRating = $reviewsCount
            ? round($beach->reviews->avg('rating'), 1)
            : null;

        return view('beaches.show', compact(
            'beach',
            'reviewsCount',
            'averageRating'
        ));
    }

    /* =======================
     *  UPDATE BEACH + AMENITIES
     * ======================= */
    public function updateAll(Request $request, Beach $beach)
    {
        $this->authorizeOwner($beach);

        $beach->update($request->only([
            'name', 'description', 'latitude', 'longitude'
        ]));

        if ($request->hasFile('image')) {
            $beach->image_path = $request->file('image')->store('beaches', 'public');
            $beach->save();
        }

        /* Update existing amenities */
        if ($request->has('amenities')) {
            foreach ($request->amenities as $data) {
                $amenity = $beach->amenities()->find($data['id']);

                if ($amenity) {
                    $amenity->description = $data['description'];

                    if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $path = $data['image']->store('amenities', 'public');
                        $amenity->images = json_encode([$path]);
                    }

                    $amenity->save();
                }
            }
        }

        /* Add new amenities */
        if ($request->has('new_amenities')) {
            foreach ($request->new_amenities as $data) {
                $path = null;

                if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $path = $data['image']->store('amenities', 'public');
                }

                $beach->amenities()->create([
                    'description' => $data['description'],
                    'images' => $path ? json_encode([$path]) : json_encode([]),
                ]);
            }
        }

        return back()->with('success', 'Beach and amenities updated successfully!');
    }

    /* =======================
     *  OWNER CHECK
     * ======================= */
    private function authorizeOwner(Beach $beach)
    {
        abort_if($beach->owner_id !== Auth::id(), 403);
    }
}
