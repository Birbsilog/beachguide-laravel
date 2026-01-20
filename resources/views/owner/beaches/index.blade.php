@extends('layouts.owner')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">My Beaches</h2>
        <a href="{{ route('owner.beaches.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
           + Add New Beach
        </a>
    </div>

    @if($beaches->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($beaches as $beach)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col">
                    <!-- Beach Image -->
                    @if($beach->image_path)
                        <img src="{{ asset('storage/' . $beach->image_path) }}" 
                             alt="{{ $beach->name }}" 
                             class="w-full h-48 object-cover rounded-t-xl">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" 
                             alt="No Image" 
                             class="w-full h-48 object-cover rounded-t-xl">
                    @endif

                    <div class="p-4 flex flex-col flex-grow">
                        <!-- Title + Status -->
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $beach->name }}</h3>
                            <span class="px-3 py-1 text-xs rounded-full 
                                @if($beach->status === 'approved') bg-green-100 text-green-700 
                                @elseif($beach->status === 'pending') bg-yellow-100 text-yellow-700 
                                @else bg-red-100 text-red-700 @endif">
                                {{ ucfirst($beach->status) }}
                            </span>
                        </div>

                        <!-- Description -->
                        <p class="text-sm text-gray-600 flex-grow">
                            {{ Str::limit($beach->description, 80) }}
                        </p>

                        <!-- Actions -->
                        <div class="flex justify-between items-center mt-4 space-x-2">
                            <a href="{{ route('beaches.show', $beach->id) }}" 
                               class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-sm py-2 rounded-lg text-center">
                               View
                            </a>
                            <a href="{{ route('owner.beaches.edit', $beach->id) }}" 
                               class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-gray-800 text-sm py-2 rounded-lg text-center">
                               Edit
                            </a>
                            <form action="{{ route('owner.beaches.destroy', $beach->id) }}" 
                                  method="POST" 
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this beach?')"
                                        class="w-full bg-red-500 hover:bg-red-600 text-white text-sm py-2 rounded-lg">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-yellow-50 text-yellow-800 px-4 py-3 rounded-lg">
            You haven’t added any beaches yet. Click <b>+ Add New Beach</b> to get started!
        </div>
    @endif
</div>
@endsection
