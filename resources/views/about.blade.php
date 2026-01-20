{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Us - BeachGuide Catanduanes')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<style>
    .hero-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #0d9488 50%, #0891b2 100%);
    }
    .feature-hover:hover {
        transform: translateY(-4px);
    }
</style>
@endpush

@section('content')
<body class="min-h-screen bg-gradient-to-b from-sky-50 to-white">
    
    <!-- Hero Section -->
    <section class="relative hero-gradient text-white py-20 px-4">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="relative max-w-4xl mx-auto text-center">
            <div class="flex items-center justify-center mb-6">
                <svg class="w-12 h-12 mr-3 text-cyan-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-4xl md:text-6xl font-bold">BeachGuide</h1>
            </div>
            <p class="text-xl md:text-2xl mb-8 text-cyan-100">
                Your Gateway to Catanduanes' Most Beautiful Beaches
            </p>
            <p class="text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Discover the untouched beauty of the Philippines' "Happy Island" through the eyes of passionate students dedicated to showcasing our home's natural wonders.
            </p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Story</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-teal-400 to-blue-500 mx-auto"></div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-gray-100">
                <div class="flex items-start mb-6">
                    <div class="bg-gradient-to-br from-teal-100 to-blue-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Born from Passion, Built with Purpose</h3>
                        <p class="text-gray-600 leading-relaxed text-lg mb-6">
                            BeachGuide began as a capstone project by a dedicated team of students who share a deep love for Catanduanes and its breathtaking coastline. We saw the incredible potential of our island's beaches – from world-renowned surfing spots to secluded coves that only locals know about.
                        </p>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            What started as an academic project has grown into something much more meaningful: a bridge connecting travelers with the authentic beauty of Catanduanes while supporting our local communities along the way.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-16 px-4 bg-gradient-to-r from-teal-50 to-blue-50">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <div class="bg-gradient-to-br from-teal-100 to-blue-100 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v6l4 2"></path>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Mission</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    To showcase the unparalleled beauty of Catanduanes beaches while empowering both travelers and our local community.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-br from-blue-100 to-teal-100 rounded-full p-2 mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Discover Hidden Gems</h3>
                    </div>
                    <p class="text-gray-600">
                        We're passionate about sharing both famous destinations and secret spots that make Catanduanes special, helping you experience our island like a local.
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-br from-teal-100 to-cyan-100 rounded-full p-2 mr-3">
                            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Support Local Communities</h3>
                    </div>
                    <p class="text-gray-600">
                        Every visitor we guide helps support local businesses, tour guides, and communities, creating sustainable tourism that benefits everyone.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What We Offer</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Everything you need to plan the perfect beach adventure in Catanduanes
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Repeatable feature cards remain the same --}}
                {{-- ... Your feature items here (unchanged) --}}
            </div>
        </div>
    </section>

    <!-- Community Impact Section -->
    <section class="py-16 px-4 hero-gradient text-white">
        <div class="max-w-4xl mx-auto text-center">
            {{-- ... Content unchanged --}}
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Ready to Explore?</h2>
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Join us on this journey to discover the pristine beaches, warm hospitality, and natural wonders that make Catanduanes a true paradise.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-gradient-to-r from-teal-500 to-blue-600 text-white px-8 py-4 rounded-full font-semibold hover:from-teal-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 inline-block">
                    Start Exploring Beaches
                </a>
                <a href="#" class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold hover:border-teal-500 hover:text-teal-600 transition-all duration-300 inline-block">
                    Learn More About Us
                </a>
            </div>
        </div>
    </section>

</body>
@endsection
