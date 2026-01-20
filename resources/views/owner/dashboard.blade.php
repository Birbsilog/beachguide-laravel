@extends('layouts.owner')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard Overview</h2>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('owner.beaches.index') }}" class="bg-white shadow rounded-xl p-4 text-center hover:shadow-md transition">
            <h3 class="text-lg font-medium text-gray-600">My Beaches</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $counts['beaches'] }}</p>
        </a>
        <div class="bg-white shadow rounded-xl p-4 text-center">
            <h3 class="text-lg font-medium text-gray-600">Inquiries</h3>
            <p class="text-3xl font-bold text-green-600">{{ $counts['inquiries'] }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-4 text-center">
            <h3 class="text-lg font-medium text-gray-600">Reviews</h3>
            <p class="text-3xl font-bold text-yellow-500">{{ $counts['reviews'] }}</p>
        </div>
    </div>

    <!-- Recent Inquiries -->
    <div class="mt-8 bg-white shadow rounded-xl p-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Recent Inquiries</h3>
        @if($inquiries->count())
            <ul class="space-y-3">
                @foreach($inquiries->take(5) as $inquiry)
                    <li class="p-3 bg-gray-50 rounded-lg shadow-sm flex justify-between">
                        <span class="text-gray-700">
                            <strong>{{ $inquiry->user->name ?? 'Guest' }}</strong> — 
                            {{ $inquiry->subject }}
                        </span>
                        <span class="text-sm text-gray-500">{{ $inquiry->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No inquiries yet.</p>
        @endif
    </div>
@endsection
