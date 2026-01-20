
{{-- resources/views/admin/beaches/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="p-6">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Beach Details</h1>
        <a href="{{ route('admin.beaches.index') }}" 
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            ← Back to Beaches
        </a>
    </div>

    {{-- Beach Info Card --}}
    <div class="bg-white shadow-md rounded-xl p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-6">
            {{-- Beach Image --}}
            @if($beach->image_path)
                <img 
                    src="{{ asset('storage/' . $beach->image_path) }}" 
                    alt="{{ $beach->name }}" 
                    class="w-full md:w-1/2 h-64 object-cover rounded-lg cursor-pointer hover:opacity-90 transition"
                    onclick="openImagePreview('{{ asset('storage/' . $beach->image_path) }}')"
                >
            @else
                <div class="w-full md:w-1/2 h-64 bg-gray-100 flex items-center justify-center rounded-lg text-gray-500">
                    No image available
                </div>
            @endif

            {{-- Beach Info --}}
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $beach->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $beach->description ?? 'No description available.' }}</p>

                <p><strong>Latitude:</strong> {{ $beach->latitude ?? 'N/A' }}</p>
                <p><strong>Longitude:</strong> {{ $beach->longitude ?? 'N/A' }}</p>

                <p class="mt-2"><span class="font-semibold text-gray-800">Status:</span> 
                    <span class="px-2 py-1 rounded-md 
                        @if($beach->status === 'approved') bg-green-100 text-green-700 
                        @elseif($beach->status === 'pending') bg-yellow-100 text-yellow-700 
                        @else bg-red-100 text-red-700 @endif">
                        {{ ucfirst($beach->status) }}
                    </span>
                </p>

                <p class="mt-2"><span class="font-semibold text-gray-800">Created At:</span> {{ $beach->created_at->format('M d, Y') }}</p>
                <p class="mt-2"><span class="font-semibold text-gray-800">Updated At:</span> {{ $beach->updated_at->format('M d, Y') }}</p>

                <p class="mt-2"><span class="font-semibold text-gray-800">Owner:</span> 
                    {{ $beach->owner->name ?? 'N/A' }}
                </p>
                <p class="mt-2"><span class="font-semibold text-gray-800">Email:</span> 
                    {{ $beach->owner->email ?? 'N/A' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Amenities Section --}}
    <div class="bg-white shadow-md rounded-xl p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Amenities</h3>
        @if($beach->amenities->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($beach->amenities as $amenity)
                    <div class="flex items-start space-x-4 p-3 border rounded-lg hover:shadow transition">
                        {{-- Amenity Image --}}
                        @php
                            $amenityImages = json_decode($amenity->images, true);
                            $firstImage = $amenityImages[0] ?? null;
                        @endphp

                        @if($firstImage)
                            <img 
                                src="{{ asset('storage/' . $firstImage) }}" 
                                alt="{{ $amenity->name }}" 
                                class="w-16 h-16 object-cover rounded-md cursor-pointer hover:opacity-90 transition"
                                onclick="openImagePreview('{{ asset('storage/' . $firstImage) }}')"
                            >
                        @else
                            <div class="w-16 h-16 bg-gray-100 flex items-center justify-center text-gray-400 rounded-md">
                                No image
                            </div>
                        @endif

                        {{-- Amenity Details --}}
                        <div>
                            <p class="font-medium text-gray-800">{{ $amenity->name }}</p>
                            <p class="text-gray-600 text-sm">{{ $amenity->description ?? 'No description available.' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No amenities listed for this beach.</p>
        @endif
    </div>

    {{-- Actions --}}
    <div class="flex space-x-4">
        @if($beach->status !== 'approved')
            <form action="{{ route('admin.beaches.approve', $beach->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" 
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Approve
                </button>
            </form>
        @endif

        @if($beach->status !== 'denied')
            <form action="{{ route('admin.beaches.deny', $beach->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Deny
                </button>
            </form>
        @endif
    </div>
</div>

{{-- 🔍 Image Preview Modal --}}
<div id="imagePreviewModal" 
     class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-50 backdrop-blur-sm transition-opacity duration-300">
    <span class="absolute top-5 right-8 text-white text-4xl font-bold cursor-pointer hover:text-gray-300" onclick="closeImagePreview()">
        &times;
    </span>
    <img id="previewImage" src="" class="max-h-[90vh] max-w-[90vw] rounded-lg shadow-lg border-4 border-white transition-transform duration-300 scale-100" alt="Preview">
</div>

<script>
    function openImagePreview(src) {
        const modal = document.getElementById('imagePreviewModal');
        const image = document.getElementById('previewImage');
        image.src = src;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeImagePreview() {
        const modal = document.getElementById('imagePreviewModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    // Close modal when clicking outside image
    document.getElementById('imagePreviewModal').addEventListener('click', (e) => {
        if (e.target.id === 'imagePreviewModal') closeImagePreview();
    });
</script>
@endsection
