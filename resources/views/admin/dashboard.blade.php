{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8" style="margin-top: 30px">
    <!-- Pending Beaches -->
    <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-yellow-800">Pending Beaches</h3>
        <p class="text-3xl font-bold text-yellow-700 mt-2">{{ $pendingCount }}</p>
        <a href="{{ route('admin.beaches.index') }}#pending" 
           class="inline-block mt-3 text-sm text-yellow-700 hover:underline">
            Review Pending Beaches →
        </a>
    </div>

    <!-- Approved Beaches -->
    <div class="bg-green-100 border-l-4 border-green-500 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-green-800">Approved Beaches</h3>
        <p class="text-3xl font-bold text-green-700 mt-2">{{ $approvedCount }}</p>
        <a href="{{ route('admin.beaches.index') }}#approved" 
           class="inline-block mt-3 text-sm text-green-700 hover:underline">
            View Approved Beaches →
        </a>
    </div>

    <!-- Denied Beaches -->
    <div class="bg-red-100 border-l-4 border-red-500 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-red-800">Denied Beaches</h3>
        <p class="text-3xl font-bold text-red-700 mt-2">{{ $deniedCount }}</p>
        <a href="{{ route('admin.beaches.index') }}#denied" 
           class="inline-block mt-3 text-sm text-red-700 hover:underline">
            View Denied Beaches →
        </a>
    </div>
</div>

<!-- Recent Activity / Pending List -->
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Recently Submitted Beaches</h2>

    @if($recentBeaches->isEmpty())
        <p class="text-gray-600">No recent submissions.</p>
    @else
        <ul class="divide-y divide-gray-200">
            @foreach($recentBeaches as $beach)
                <li class="py-3 flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-900">{{ $beach->name }}</p>
                        <p class="text-sm text-gray-600">
                            Submitted by {{ $beach->owner->name ?? 'Unknown Owner' }}
                        </p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <!-- Status badge -->
                        <span class="px-2 py-1 text-xs font-semibold rounded 
                            @if($beach->status === 'pending') bg-yellow-200 text-yellow-800 
                            @elseif($beach->status === 'approved') bg-green-200 text-green-800 
                            @else bg-red-200 text-red-800 @endif">
                            {{ ucfirst($beach->status) }}
                        </span>

                        <!-- View button -->
                        <a href="{{ route('admin.beaches.show', $beach) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded">
                            View
                        </a>

                        @if($beach->status === 'pending')
                            <!-- Approve Button -->
                            <form action="{{ route('admin.beaches.approve', $beach) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                    class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded">
                                    Approve
                                </button>
                            </form>

                            <!-- Deny Button -->
                            <form action="{{ route('admin.beaches.deny', $beach) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                                    Deny
                                </button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
