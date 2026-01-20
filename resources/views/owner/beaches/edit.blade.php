@extends('layouts.owner')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    @if (session('success'))
        <div id="successMessage" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
         ✅ {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold mb-4">Edit Beach: {{ $beach->name }}</h2>

    {{-- Combined Update Form (Beach + Amenities) --}}
    <form action="{{ route('owner.beaches.updateAll', $beach->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- ========== BEACH DETAILS ========== --}}
        <div class="border-b pb-4 mb-4">
            <h3 class="text-lg font-semibold mb-3">Beach Information</h3>

            {{-- Beach Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Beach Name</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $beach->name) }}"
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>{{ old('description', $beach->description) }}</textarea>
            </div>

            {{-- Latitude & Longitude --}}
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="latitude" class="block text-sm font-medium">Latitude</label>
                    <input type="text" name="latitude" id="latitude"
                           value="{{ old('latitude', $beach->latitude) }}"
                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label for="longitude" class="block text-sm font-medium">Longitude</label>
                    <input type="text" name="longitude" id="longitude"
                           value="{{ old('longitude', $beach->longitude) }}"
                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>
                </div>
            </div>

            {{-- Beach Image Preview --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Beach Image</label>
                <img id="beachPreview"
                     src="{{ $beach->image_path ? asset('storage/' . $beach->image_path) : '' }}"
                     class="w-48 h-32 object-cover rounded mb-2 border {{ $beach->image_path ? '' : 'hidden' }}">
                <input type="file" name="image" id="image"
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                       accept="image/*" onchange="previewImage(event, 'beachPreview')">
            </div>
        </div>

        {{-- ========== AMENITIES SECTION ========== --}}
        <div>
            <h3 class="text-lg font-semibold mb-3">Amenities</h3>

            @if($beach->amenities->isEmpty())
                <p class="text-gray-500 italic mb-4">No amenities added yet.</p>
            @else
                <div id="existingAmenities" class="space-y-4 mb-6">
                    @foreach($beach->amenities as $index => $amenity)
                        @php
                            // Decode JSON images (if any)
                            $images = is_array($amenity->images)
                                ? $amenity->images
                                : json_decode($amenity->images, true);
                            $firstImage = $images[0] ?? null;
                        @endphp

                        <div class="border p-4 rounded bg-gray-50">
                            <input type="hidden" name="amenities[{{ $index }}][id]" value="{{ $amenity->id }}">
                            <div class="flex justify-between items-start">
                                <div class="w-full">
                                    {{-- Amenity Description --}}
                                    <label class="block text-sm font-medium">Description</label>
                                    <input type="text" name="amenities[{{ $index }}][description]"
                                           value="{{ $amenity->description }}"
                                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300 mb-2">

                                    {{-- Amenity Image --}}
                                    <label class="block text-sm font-medium">Amenity Image</label>
                                    <img id="amenityPreview{{ $index }}"
                                         src="{{ $firstImage ? asset('storage/' . $firstImage) : '' }}"
                                         class="w-32 h-24 object-cover rounded mb-2 border {{ $firstImage ? '' : 'hidden' }}">
                                    <input type="file"
                                           name="amenities[{{ $index }}][image]"
                                           accept="image/*"
                                           onchange="previewImage(event, 'amenityPreview{{ $index }}')"
                                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Add New Amenity Section --}}
            <div id="newAmenitiesContainer" class="mb-4"></div>

            <button type="button"
                    onclick="addNewAmenity()"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Add Amenity
            </button>
        </div>

        {{-- ========== SINGLE UPDATE BUTTON ========== --}}
        <div class="text-right mt-6 border-t pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                💾 Update All
            </button>
        </div>
    </form>
</div>

{{-- ======== SCRIPTS ======== --}}
<script>
function previewImage(event, previewId) {
    const reader = new FileReader();
    const preview = document.getElementById(previewId);
    reader.onload = function() {
        preview.src = reader.result;
        preview.classList.remove('hidden');
    }
    reader.readAsDataURL(event.target.files[0]);
}

// Dynamically add new amenities
let amenityCount = {{ $beach->amenities->count() }};
function addNewAmenity() {
    const container = document.getElementById('newAmenitiesContainer');
    const newAmenity = document.createElement('div');
    newAmenity.classList.add('border', 'p-4', 'rounded', 'bg-gray-50', 'mt-4');
    newAmenity.innerHTML = `
        <label class="block text-sm font-medium">Amenity Description</label>
        <input type="text" name="new_amenities[${amenityCount}][description]"
               class="w-full border rounded p-2 focus:ring focus:ring-blue-300 mb-2"
               placeholder="e.g. Cottage, Parking Area" required>

        <label class="block text-sm font-medium">Amenity Image</label>
        <img id="newAmenityPreview${amenityCount}"
             class="w-32 h-24 object-cover rounded mb-2 border hidden">
        <input type="file" name="new_amenities[${amenityCount}][image]"
               class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
               accept="image/*"
               onchange="previewImage(event, 'newAmenityPreview${amenityCount}')">
    `;
    container.appendChild(newAmenity);
    amenityCount++;
}
 // Auto-hide success message after 4 seconds
    document.addEventListener("DOMContentLoaded", function() {
        const msg = document.getElementById('successMessage');
        if (msg) {
            setTimeout(() => {
                msg.style.transition = "opacity 0.6s ease";
                msg.style.opacity = 0;
                setTimeout(() => msg.remove(), 600);
            }, 4000);
        }
    });
</script>
@endsection
