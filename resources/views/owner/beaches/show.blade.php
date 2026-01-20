@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        
        @if($beach->image_path)
            <img src="{{ asset('storage/' . $beach->image_path) }}" 
                 alt="{{ $beach->name }}" 
                 class="w-full h-96 object-cover">
        @else
            <div class="w-full h-96 bg-gray-200 flex items-center justify-center text-gray-500">
                No Image Available
            </div>
        @endif

        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $beach->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $beach->description }}</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="font-semibold text-xl mb-2">Location</h2>
                    @if($beach->latitude && $beach->longitude)
                        <p>Latitude: {{ $beach->latitude }}</p>
                        <p>Longitude: {{ $beach->longitude }}</p>
                    @else
                        <p class="text-gray-500">Location not provided</p>
                    @endif
                </div>

                <div>
                    <h2 class="font-semibold text-xl mb-2">Owner Info</h2>
                    @if($beach->owner)
                        <p><strong>Name:</strong> {{ $beach->owner->name }}</p>
                        <p><strong>Email:</strong> {{ $beach->owner->email }}</p>
                    @else
                        <p class="text-gray-500">No owner info available</p>
                    @endif
                </div>
            </div>

            <div class="mt-8">
                <h2 class="font-semibold text-xl mb-4">Amenities</h2>
                @if($beach->amenities && $beach->amenities->count() > 0)
                    <ul class="list-disc pl-5 space-y-3">
                        @foreach($beach->amenities as $amenity)
                            <li>
                                <p>{{ $amenity->description }}</p>
                                @if($amenity->images)
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-2">
                                        @foreach(json_decode($amenity->images, true) ?? [] as $img)
                                            <img src="{{ asset('storage/' . $img) }}" 
                                                 class="w-full h-32 object-cover rounded">
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No amenities listed</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
