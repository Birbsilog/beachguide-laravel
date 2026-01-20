{{-- Beach Tourism Hero Section Component --}}
<section class="relative bg-gradient-to-br from-gray-50 to-blue-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-8">
                <div class="inline-flex items-center space-x-3 bg-white rounded-full px-4 py-2 shadow-sm">
                  
                    <h1 class="text-2xl font-bold text-slate-900">BeachGuide</h1>
                </div>

                <div class="space-y-4">
                    <p class="text-3xl lg:text-4xl font-bold text-slate-900 leading-tight">
                        is your beach travel companion, here to make planning your coastal getaway as easy as feeling sand between your toes.
                    </p>
                    <p class="text-lg text-slate-700 leading-relaxed">
                        Built with local expertise and powered by real-time data, BeachGuide helps you discover and plan your perfect beach vacation from start to finish.
                    </p>
                </div>

                {{-- Features Grid --}}
                <div class="grid grid-cols-2 gap-6 pt-4">
                    {{-- Feature 1 --}}
                    <div class="space-y-2">
                        <div class="text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-slate-900">Discover beaches</h3>
                        <p class="text-sm text-slate-600">Find your perfect coastal paradise</p>
                    </div>

                    {{-- Feature 2 --}}
                    <div class="space-y-2">
                        <div class="text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 1v2m0 18v2m11-11h-2M3 12H1m16.95 7.05l-1.41-1.41M6.46 6.46L5.05 5.05m0 13.9l1.41-1.41M17.54 6.46l1.41-1.41" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-slate-900">Check Weather</h3>
                        <p class="text-sm text-slate-600">Stay updated with the 5-day weather forecast before planning your beach trip.</p>
                    </div>

                    {{-- Feature 3 --}}
                    <div class="space-y-2">
                        <div class="text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-slate-900">Chatbot Assistance</h3>
                        <p class="text-sm text-slate-600">Get instant help through our menu-driven chatbot that answers FAQs and guides users.</p>
                    </div>

                    {{-- Feature 4 --}}
                    <div class="space-y-2">
                        <div class="text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-slate-900">View Amenities</h3>
                        <p class="text-sm text-slate-600">See available facilities and services offered by each beach destination.</p>
                    </div>
                </div>
            </div>

            {{-- Right Content - Image with Overlays --}}
            <div class="relative lg:ml-auto">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-300">
                    <img
                        src="https://images.pexels.com/photos/1450353/pexels-photo-1450353.jpeg?auto=compress&cs=tinysrgb&w=800"
                        alt="Beach traveler"
                        class="w-full h-[500px] object-cover"
                    />

                    {{-- Floating Card 1 - Top --}}
                    <div class="absolute top-6 right-6 bg-white rounded-2xl px-4 py-3 shadow-lg flex items-center space-x-2 animate-float">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                        </svg>
                        <span class="text-sm font-medium text-slate-700">Find beach</span>
                    </div>

                    {{-- Floating Card 2 - Bottom --}}
                    <div class="absolute bottom-6 left-6 bg-white rounded-2xl px-4 py-3 shadow-lg flex items-center space-x-2 animate-float-delayed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                            <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                            <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                        </svg>
                        <span class="text-sm font-medium text-slate-700">Crystal clear waters nearby</span>
                    </div>
                </div>

                {{-- Decorative Elements --}}
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-blue-200 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-cyan-200 rounded-full blur-3xl opacity-50"></div>
            </div>
        </div>
    </div>

   
</section>

<style>
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 3s ease-in-out infinite 1.5s;
    }

    .writing-vertical {
        writing-mode: vertical-rl;
        text-orientation: mixed;
    }
</style>
