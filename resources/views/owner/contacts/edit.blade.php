@extends('layouts.owner')

@section('content')
<div class="max-w-3xl mx-auto">

    <!-- Page Header -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Edit Contact Information
    </h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-5 p-4 bg-red-100 text-red-700 rounded-lg">
            <p class="font-semibold mb-2">Please fix the following errors:</p>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('owner.contacts.update', $contact) }}"
          method="POST"
          class="bg-white p-6 rounded-xl shadow space-y-6">
        @csrf
        @method('PUT')

        <!-- Contact Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Contact Type
            </label>
            <select name="type"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-cyan-200">
                @php
                    $types = ['phone', 'email', 'facebook', 'instagram', 'website', 'emergency'];
                @endphp

                @foreach ($types as $type)
                    <option value="{{ $type }}"
                        {{ old('type', $contact->type) === $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Contact Value -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Contact Details
            </label>
            <input type="text"
                   name="value"
                   value="{{ old('value', $contact->value) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-cyan-200"
                   placeholder="e.g. +63 912 345 6789">
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('owner.contacts.index') }}"
               class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white font-semibold shadow">
                Update Contact
            </button>
        </div>
    </form>

</div>
@endsection
