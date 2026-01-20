<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $beach->name }} - BeachGuide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
  window.botpressWebChat.onEvent(
    (event) => {
      if (event.type === 'UI.BUTTON_CLICKED' && event.payload.action === 'open_url') {
       
        window.location.href = event.payload.url;
      }
    },
    ['UI.BUTTON_CLICKED']
  );
</script>
<!-- Fullscreen Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center hidden z-[9999]">
    <span id="closeModal" class="absolute top-4 right-4 text-white text-3xl cursor-pointer">&times;</span>
    <img id="modalImage" class="max-h-[80vh] max-w-[80vw]" src="" alt="">
</div>


<script>
  function openImageModal(src) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    modalImg.src = src;
    modal.classList.remove('hidden');
  }

  function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
  }
  const modal = document.getElementById('imageModal');
const closeModal = document.getElementById('closeModal');
const modalImage = document.getElementById('modalImage');

closeModal.addEventListener('click', () => modal.classList.add('hidden'));
modal.addEventListener('click', (e) => {
    if (e.target === modal) modal.classList.add('hidden');
});

</script>


</head>
<body class="bg-gray-50 text-gray-800">
    @include('components.navbar')
    <!-- <nav class="bg-white shadow-md sticky top-0 z-50 px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-blue-600">BeachGuide</a>
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('explore') }}" class="text-gray-700 hover:text-blue-600 font-medium">Explore</a>
            <a href="{{ route('weather') }}" class="text-gray-700 hover:text-blue-600 font-medium">Weather</a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
        </div>
    </nav> -->


    <div class="max-w-6xl mx-auto px-4 py-8">

       
        <a href="{{ route('explore') }}" class="text-blue-600 text-sm hover:underline">&larr; Back to Explore</a>

        
        <h1 class="text-3xl font-bold mt-2">{{ $beach->name }}</h1>

       
        <div class="flex space-x-6 mt-4 border-b">
            <a href="#overview" class="py-2 text-gray-700 hover:text-blue-600 font-medium">Overview</a>
            <a href="#amenities" class="py-2 text-gray-700 hover:text-blue-600 font-medium">Amenities</a>
            <a href="#routes" class="py-2 text-gray-700 hover:text-blue-600 font-medium">Routes</a>
            <a href="#reviews" class="py-2 text-gray-700 hover:text-blue-600 font-medium">Reviews</a>
            <a href="#contacts" class="py-2 text-gray-700 hover:text-blue-600 font-medium">Contacts</a>
        </div>

      <section id="overview" class="mt-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-2">
                   
                         <img 
  src="{{ asset('storage/' . $beach->image_path) }}" 
  alt="{{ $beach->name }}" 
  class="w-full h-72 object-cover rounded-lg shadow-md cursor-pointer transition-transform hover:scale-105"
  onclick="openImageModal('{{ asset('storage/' . $beach->image_path) }}')">

                </div>
                
            </div>

            <p class="mt-6 text-gray-700 leading-relaxed">
                {{ $beach->description }}
            </p>
        </section>

      
        <section id="amenities" class="mt-12">
            <h2 class="text-2xl font-semibold mb-4">What’s available at this beach</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($beach->amenities as $amenity)
                    @php
                        // Decode amenities images JSON safely
                        $amenityImages = json_decode($amenity->images, true);
                        $firstAmenityImage = $amenityImages[0] ?? null;
                    @endphp
                    <div class="p-4 border rounded-lg shadow hover:shadow-md bg-white flex flex-col items-center text-center">
                        @if($firstAmenityImage)
                            <!-- <img src="{{ asset('storage/' . $firstAmenityImage) }}" 
                                 alt="{{ $amenity->description }}" 
                                 class="w-full h-32 object-cover rounded mb-3"> -->
                                 <img 
  src="{{ asset('storage/' . $firstAmenityImage) }}" 
  alt="{{ $amenity->description }}" 
  class="w-full h-32 object-cover rounded mb-3 cursor-pointer transition-transform hover:scale-105"
  onclick="openImageModal('{{ asset('storage/' . $firstAmenityImage) }}')">

                        @else
                            <img src="{{ asset('images/default.jpg') }}" 
                                 alt="No image" 
                                 class="w-full h-32 object-cover rounded mb-3">
                        @endif
                        <h3 class="font-semibold text-lg">{{ $amenity->description }}</h3>
                    </div>
                @empty
                    <p class="text-gray-500">No amenities listed for this beach.</p>
                @endforelse
            </div>
        </section>

        
        <section id="routes" class="mt-12">
            <h2 class="text-2xl font-semibold mb-4">Locate Beach</h2>
            <div class="w-full h-80 rounded-lg shadow">
                <iframe 
                    width="100%" height="100%" frameborder="0" style="border:0; border-radius: 8px;"
                    src="https://www.google.com/maps?q={{ $beach->latitude }},{{ $beach->longitude }}&hl=en&z=14&output=embed">
                </iframe>
            </div>
        </section>

        
       <section id="reviews" class="mt-12">
    <h2 class="text-2xl font-semibold mb-6">Reviews</h2>

    {{-- Top summary panel --}}
    <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col md:flex-row gap-6">
        <div class="flex-1">
            <div class="flex items-center gap-4">
                <div class="text-4xl font-bold text-gray-900">
                    {{ $averageRating ?? '—' }}
                </div>
                <div>
                    <div class="flex items-center">
                        @php $stars = $averageRating ? floor($averageRating) : 0; @endphp
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $stars ? 'text-yellow-400' : 'text-gray-300' }}" fill="{{ $i <= $stars ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.09 6.419h6.71c.969 0 1.371 1.24.588 1.81l-5.43 3.944 2.09 6.419c.3.921-.755 1.688-1.54 1.118l-5.43-3.944-5.43 3.944c-.784.57-1.838-.197-1.54-1.118l2.09-6.419-5.43-3.944c-.783-.57-.38-1.81.588-1.81h6.71l2.09-6.419z"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-500 text-sm">{{ $reviewsCount ?? 0 }} reviews</p>
                </div>
            </div>

            <a href="#write-review" class="mt-4 inline-block px-6 py-2 bg-green-800 text-white rounded-full hover:bg-green-700">Write a Review</a>
        </div>

        {{-- optional rating distribution (simple bars) --}}
        <div class="flex-1 space-y-2">
            @foreach([5,4,3,2,1] as $star)
                @php
                    $countForStar = $beach->reviews ? $beach->reviews->where('rating', $star)->count() : 0;
                    $pct = ($reviewsCount) ? round($countForStar / $reviewsCount * 100) : 0;
                @endphp
                <div class="flex items-center gap-3">
                    <div class="w-6 text-sm text-gray-700">{{ $star }}★</div>
                    <div class="flex-1 bg-gray-200 h-2 rounded overflow-hidden">
                        <div class="bg-green-700 h-2" style="width: {{ $pct }}%"></div>
                    </div>
                    <div class="w-10 text-sm text-gray-600 text-right">{{ $countForStar }}</div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Reviews list --}}
    <div class="mt-8 space-y-6">
        @if($beach->reviews && $beach->reviews->count())
            @foreach($beach->reviews as $review)
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="flex items-start gap-4">
                       
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold">{{ $review->user->name ?? 'User' }}</h4>
                                    <p class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="flex items-center">
                                    @for($i=1;$i<=5;$i++)
                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.09 6.419h6.71c.969 0 1.371 1.24.588 1.81l-5.43 3.944 2.09 6.419c.3.921-.755 1.688-1.54 1.118l-5.43-3.944-5.43 3.944c-.784.57-1.838-.197-1.54-1.118l2.09-6.419-5.43-3.944c-.783-.57-.38-1.81.588-1.81h6.71l2.09-6.419z"/></svg>
                                    @endfor
                                </div>
                            </div>

                            {{-- tags if you have them (optional) --}}
                            @if(!empty($review->tags))
                                <div class="mt-2 flex gap-2">
                                    @foreach(explode(',', $review->tags) as $tag)
                                        <span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <p class="mt-3 text-gray-700">{{ $review->comment }}</p>

                            @if(!empty($review->photo_path))
                                <div class="mt-3">
                                    <img src="{{ asset('storage/'.$review->photo_path) }}" class="w-36 h-36 object-cover rounded" alt="review photo">
                                </div>
                            @endif

                            <div class="mt-3">
                                <a href="#" class="text-blue-600 text-sm hover:underline">Show activity</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No reviews yet. Be the first to review this beach.</p>
        @endif
    </div>

    {{-- Write review form (logged in users only) --}}
    <div id="write-review" class="mt-8 bg-white p-6 rounded-xl shadow-sm">
        @auth
            <h3 class="font-semibold mb-3">Write a review</h3>

            @if(session('success'))
                <div class="mb-3 text-green-700">{{ session('success') }}</div>
            @endif

            <form action="{{ route('beaches.reviews.store', $beach) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center gap-4">
                    <label class="font-medium">Rating</label>
                    <select name="rating" class="border rounded px-3 py-2">
                        <option value="">Select</option>
                        @for($i=5;$i>=1;$i--)
                            <option value="{{ $i }}">{{ $i }} star{{ $i>1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mt-4">
                    <label class="font-medium">Comment</label>
                    <textarea name="comment" rows="4" class="w-full border rounded p-2" placeholder="Share your experience..."></textarea>
                </div>

                {{-- optional photo upload:
                <div class="mt-3">
                    <label>Photo</label>
                    <input type="file" name="photo" accept="image/*">
                </div>
                --}}

                <div class="mt-4">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded">Submit review</button>
                </div>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}" class="text-blue-600 underline">log in</a> to write a review.</p>
        @endauth
    </div>
</section>


       
        <section id="contacts" class="mt-12">
    <h2 class="text-2xl font-semibold mb-4">Contact & Social Media</h2>

    @if($beach->contacts && $beach->contacts->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-white p-6 rounded-xl shadow">

            @foreach($beach->contacts as $contact)
                <div class="flex items-start gap-3">
                    {{-- Icon --}}
                    <div class="text-blue-600 mt-1">
                        @switch($contact->type)
                            @case('phone')
                                📞
                                @break
                            @case('email')
                                ✉️
                                @break
                            @case('facebook')
                                📘
                                @break
                            @case('instagram')
                                📸
                                @break
                            @default
                                🔗
                        @endswitch
                    </div>

                    {{-- Value --}}
                    <div>
                        <p class="font-medium capitalize text-gray-800">
                            {{ $contact->type }}
                        </p>

                        @if(in_array($contact->type, ['facebook', 'instagram', 'website']))
                            <a href="{{ $contact->value }}"
                               target="_blank"
                               class="text-blue-600 hover:underline break-all">
                                {{ $contact->value }}
                            </a>
                        @elseif($contact->type === 'email')
                            <a href="mailto:{{ $contact->value }}"
                               class="text-blue-600 hover:underline">
                                {{ $contact->value }}
                            </a>
                        @else
                            <p class="text-gray-700 break-all">
                                {{ $contact->value }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <p class="text-gray-500 italic">
            No contact information available for this beach.
        </p>
    @endif
</section>

    </div>

    
    <footer class="bg-gray-100 text-center py-6 mt-12 border-t text-gray-600">
        &copy; {{ date('Y') }} BeachGuide. All rights reserved.
    </footer>

</body>
</html>
