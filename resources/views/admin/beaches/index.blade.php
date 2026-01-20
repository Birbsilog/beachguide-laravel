@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded-lg shadow" style="margin-top: 30px">
    <h2 class="text-2xl font-semibold mb-6">Manage Beaches</h2>

    <!-- Tabs -->
    <div x-data="{ tab: 'pending' }">
        <div class="border-b mb-4">
            <nav class="flex space-x-4">
                <button 
                    @click="tab = 'pending'" 
                    :class="tab === 'pending' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" 
                    class="px-3 py-2 font-medium text-sm border-b-2 focus:outline-none">
                    Pending
                </button>
                <button 
                    @click="tab = 'approved'" 
                    :class="tab === 'approved' ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" 
                    class="px-3 py-2 font-medium text-sm border-b-2 focus:outline-none">
                    Approved
                </button>
                <button 
                    @click="tab = 'denied'" 
                    :class="tab === 'denied' ? 'border-red-500 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" 
                    class="px-3 py-2 font-medium text-sm border-b-2 focus:outline-none">
                    Denied
                </button>
            </nav>
        </div>

        <!-- Pending Beaches -->
        <div x-show="tab === 'pending'" class="space-y-4">
            @forelse($pendingBeaches as $beach)
                <div class="p-4 border rounded-lg bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $beach->name }}</h3>
                        <p class="text-sm text-gray-600">Owner: {{ $beach->owner->name ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-600">Status: {{ ucfirst($beach->status) }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <form action="{{ route('admin.beaches.approve', $beach) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.beaches.deny', $beach) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Deny
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No pending beaches.</p>
            @endforelse
        </div>

        <!-- Approved Beaches -->
        <div x-show="tab === 'approved'" class="space-y-4" x-cloak>
            @forelse($approvedBeaches as $beach)
                <div class="p-4 border rounded-lg bg-green-50">
                    <h3 class="text-lg font-semibold">{{ $beach->name }}</h3>
                    <p class="text-sm text-gray-600">Owner: {{ $beach->owner->name ?? 'N/A' }}</p>
                </div>
            @empty
                <p class="text-gray-500">No approved beaches yet.</p>
            @endforelse
        </div>

        <!-- Denied Beaches -->
        <div x-show="tab === 'denied'" class="space-y-4" x-cloak>
            @forelse($deniedBeaches as $beach)
                <div class="p-4 border rounded-lg bg-red-50">
                    <h3 class="text-lg font-semibold">{{ $beach->name }}</h3>
                    <p class="text-sm text-gray-600">Owner: {{ $beach->owner->name ?? 'N/A' }}</p>
                </div>
            @empty
                <p class="text-gray-500">No denied beaches.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Alpine.js for tab functionality -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
