@extends('layouts.owner')

@section('content')
<div class="max-w-6xl mx-auto px-2 sm:px-4">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Contact Information
        </h2>

        <a href="{{ route('owner.beaches.contacts.create', $beach) }}"

           class="bg-cyan-600 hover:bg-cyan-700 text-white px-5 py-2 rounded-lg font-medium shadow">
            + Add Contact
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-sm uppercase text-gray-600">
                <tr>
                    <th class="px-6 py-4">Type</th>
                    <th class="px-6 py-4">Value</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($contacts as $contact)
                    <tr>
                        <td class="px-6 py-4">{{ ucfirst($contact->type) }}</td>
                        <td class="px-6 py-4 break-all">{{ $contact->value }}</td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('owner.contacts.edit', $contact) }}" class="text-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('owner.contacts.destroy', $contact) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600"
                                        onclick="return confirm('Delete this contact?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                            No contacts added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
