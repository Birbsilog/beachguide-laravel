@extends('layouts.owner')

@section('content')
<div class="max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Add Contact Information
    </h2>

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('owner.beaches.contacts.store', $beach) }}"
        method="POST"
        class="bg-white p-6 rounded-xl shadow space-y-6"
    >
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Contact Type
            </label>
            <select name="type" class="w-full border rounded-lg px-4 py-2">
                <option value="phone">Phone</option>
                <option value="email">Email</option>
                <option value="facebook">Facebook</option>
                <option value="instagram">Instagram</option>
                <option value="website">Website</option>
                <option value="emergency">Emergency</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Contact Details
            </label>
            <input type="text"
                   name="value"
                   value="{{ old('value') }}"
                   class="w-full border rounded-lg px-4 py-2">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('owner.beaches.contacts.index', $beach) }}"
               class="px-5 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-lg bg-cyan-600 text-white hover:bg-cyan-700">
                Save Contact
            </button>
        </div>
    </form>

</div>
@endsection
