@extends('layouts.owner')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-4">

    <div class="p-4 sm:p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6">Beach Reviews</h2>

        @if($reviews->isEmpty())
            <p class="text-gray-500 italic">No reviews yet for your beaches.</p>
        @else

            <!-- MOBILE VIEW (Cards) -->
            <div class="space-y-4 sm:hidden">
                @foreach ($reviews as $review)
                    <div class="border rounded-lg p-4 shadow-sm bg-gray-50">
                        <div class="mb-2">
                            <p class="text-sm text-gray-500">Beach</p>
                            <p class="font-semibold text-gray-800">
                                {{ $review->beach->name }}
                            </p>
                        </div>

                        <div class="mb-2">
                            <p class="text-sm text-gray-500">Reviewer</p>
                            <p class="text-gray-700">
                                {{ $review->user->name ?? 'Anonymous' }}
                            </p>
                        </div>

                        <div class="mb-2">
                            <p class="text-sm text-gray-500">Rating</p>
                            <div class="flex items-center space-x-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="{{ $i <= $review->rating ? '#facc15' : 'none' }}"
                                         viewBox="0 0 24 24"
                                         stroke="#facc15"
                                         class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 17.75l-5.3 2.79 1.01-5.88L3 9.79l5.9-.86L12 4l2.1 4.93 5.9.86-4.71 4.86 1.01 5.88z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        <div class="mb-2">
                            <p class="text-sm text-gray-500">Comment</p>
                            <p class="text-gray-700 break-words">
                                {{ $review->comment }}
                            </p>
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $review->created_at->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- DESKTOP VIEW (Table) -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Beach</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Reviewer</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Rating</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Comment</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-3 px-4">
                                    {{ $review->beach->name }}
                                </td>
                                <td class="py-3 px-4">
                                    {{ $review->user->name ?? 'Anonymous' }}
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="{{ $i <= $review->rating ? '#facc15' : 'none' }}"
                                                 viewBox="0 0 24 24"
                                                 stroke="#facc15"
                                                 class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 17.75l-5.3 2.79 1.01-5.88L3 9.79l5.9-.86L12 4l2.1 4.93 5.9.86-4.71 4.86 1.01 5.88z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                </td>
                                <td class="py-3 px-4 break-words">
                                    {{ $review->comment }}
                                </td>
                                <td class="py-3 px-4 text-gray-500 text-sm">
                                    {{ $review->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>

</div>
@endsection
