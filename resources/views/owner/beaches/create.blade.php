
@extends('layouts.owner')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4">Add New Beach</h2>

    <form action="{{ route('owner.beaches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Beach Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Beach Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" rows="4" 
                      class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required></textarea>
        </div>

        <!-- Latitude & Longitude -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="latitude" class="block text-sm font-medium">Latitude</label>
                <input type="text" name="latitude" id="latitude" 
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label for="longitude" class="block text-sm font-medium">Longitude</label>
                <input type="text" name="longitude" id="longitude" 
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required>
            </div>
        </div>

        <!-- Main Beach Image -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium">Upload Beach Image</label>
            <input type="file" name="image" id="image" 
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Amenities Section -->
        <div id="amenities-wrapper">
            <h3 class="text-lg font-semibold mb-2">Amenities</h3>

            <div class="amenity mb-4 border p-4 rounded relative bg-gray-50">
                <button type="button" 
                        class="remove-amenity absolute top-2 right-2 text-red-600 text-sm">✕ Remove</button>

                <label class="block text-sm font-medium">Amenity Description</label>
                <input type="text" name="amenities[0][description]" 
                       class="w-full border rounded p-2 mb-2 focus:ring focus:ring-blue-300">

                <label class="block text-sm font-medium">Amenity Images (1–5)</label>
                <input type="file" name="amenities[0][images][]" multiple accept="image/*" 
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
            </div>
        </div>

        <!-- Add More Amenities Button -->
        <button type="button" id="add-amenity"  
                class="bg-green-500 text-white px-3 py-1 rounded mb-4 hover:bg-green-600">
            + Add Amenity
        </button>

        <!-- Submit -->
        <div>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Submit for Approval
            </button>
        </div>
    </form>
</div>

<script>
let amenityIndex = 1;

// Add new amenity block
document.getElementById('add-amenity').addEventListener('click', () => {
    let wrapper = document.getElementById('amenities-wrapper');
    let div = document.createElement('div');
    div.classList.add('amenity', 'mb-4', 'border', 'p-4', 'rounded', 'relative', 'bg-gray-50');
    div.innerHTML = `
        <button type="button" 
                class="remove-amenity absolute top-2 right-2 text-red-600 text-sm">✕ Remove</button>

        <label class="block text-sm font-medium">Amenity Description</label>
        <input type="text" name="amenities[${amenityIndex}][description]" 
               class="w-full border rounded p-2 mb-2 focus:ring focus:ring-blue-300">

        <label class="block text-sm font-medium">Amenity Images (1–5)</label>
        <input type="file" name="amenities[${amenityIndex}][images][]" multiple accept="image/*" 
               class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
    `;
    wrapper.appendChild(div);
    amenityIndex++;
});

// Remove amenity block
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-amenity')) {
        e.target.closest('.amenity').remove();
    }
});
</script>
@endsection

