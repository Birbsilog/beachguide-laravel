<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Section Header -->
    <div class="flex items-end justify-between mb-8">
        <div>
            <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2">Favorites Near Virac</h2>
            <p class="text-slate-600">Discover the gems of Catanduanes</p>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="hidden md:flex gap-3">
            <button id="beach-prev" class="group bg-white hover:bg-slate-900 text-slate-900 hover:text-white p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button id="beach-next" class="group bg-white hover:bg-slate-900 text-slate-900 hover:text-white p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
    </div>

    <!-- Slider Container -->
    <div class="relative">
        <div id="beach-slider" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide pb-4">
            <!-- Slide 1 -->
            <div class="min-w-[320px] md:min-w-[360px] snap-start flex-shrink-0 group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/loucaslider.jpg') }}" alt="" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        
                        <!-- Badge -->
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                            </svg>
                            Popular
                        </div>

                        <!-- Distance Badge -->
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-slate-700 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                            
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-5 bg-white">
                        <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors">Louca Beach Resort</h3>
                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Virac, Catanduanes
                        </p>
                        
                        <!-- Features -->
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-lg font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                    <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                    <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                </svg>
                                Surfing
                            </span>
                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg font-medium">Scenic Rocks</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="min-w-[320px] md:min-w-[360px] snap-start flex-shrink-0 group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/1.jpg') }}" alt="Twin Rock Beach" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        
                        <div class="absolute top-4 right-4 bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            New
                        </div>

                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-slate-700 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                           
                        </div>
                    </div>
                    
                    <div class="p-5 bg-white">
                        <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors">Twin Rock Beach</h3>
                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Virac, Catanduanes
                        </p>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-lg font-medium">Quiet</span>
                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg font-medium">Calm Waters</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="min-w-[320px] md:min-w-[360px] snap-start flex-shrink-0 group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/seunsetslider.jpg') }}" alt="Marilima Beach" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-slate-700 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                            4.2 km away
                        </div>
                    </div>
                    
                    <div class="p-5 bg-white">
                        <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors">Sunset Coast Beach Resort</h3>
                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Virac, Catanduanes
                        </p>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-lg font-medium">Family Friendly</span>
                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg font-medium">Shallow</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="min-w-[320px] md:min-w-[360px] snap-start flex-shrink-0 group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/midtownslider.jpg') }}" alt="Talisoy Beach" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-slate-700 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                            1.8 km away
                        </div>
                    </div>
                    
                    <div class="p-5 bg-white">
                        <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors">Midtown inn Beach Resort</h3>
                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Virac, Catanduanes
                        </p>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-lg font-medium">Snorkeling</span>
                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg font-medium">Clear Water</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 5 -->
            <div class="min-w-[320px] md:min-w-[360px] snap-start flex-shrink-0 group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/oliversslider.jpg') }}" alt="Batag Beach" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                        <div class="absolute top-4 right-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            Featured
                        </div>

                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-slate-700 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                            5.0 km away
                        </div>
                    </div>
                    
                    <div class="p-5 bg-white">
                        <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors">Oliver's Riff Mamangal Beach</h3>
                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Virac, Catanduanes
                        </p>
                        
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-lg font-medium">Swimming</span>
                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg font-medium">Sandy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Indicators -->
        <div class="flex justify-center gap-2 mt-6">
            <div class="beach-indicator w-2 h-2 rounded-full bg-slate-900 transition-all duration-300"></div>
            <div class="beach-indicator w-2 h-2 rounded-full bg-slate-300 transition-all duration-300"></div>
            <div class="beach-indicator w-2 h-2 rounded-full bg-slate-300 transition-all duration-300"></div>
            <div class="beach-indicator w-2 h-2 rounded-full bg-slate-300 transition-all duration-300"></div>
            <div class="beach-indicator w-2 h-2 rounded-full bg-slate-300 transition-all duration-300"></div>
        </div>
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<script>
    const slider = document.getElementById('beach-slider');
    const prevBtn = document.getElementById('beach-prev');
    const nextBtn = document.getElementById('beach-next');
    const indicators = document.querySelectorAll('.beach-indicator');
    
    let isAutoScrolling = true;
    let autoScrollInterval;
    
    // Scroll one card width
    function scrollToSlide(direction) {
        const cardWidth = slider.querySelector('div').offsetWidth + 24; // card width + gap
        slider.scrollBy({
            left: direction === 'next' ? cardWidth : -cardWidth,
            behavior: 'smooth'
        });
    }
    
    // Auto scroll
    function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            if (isAutoScrolling) {
                // Check if at the end
                if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10) {
                    slider.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    scrollToSlide('next');
                }
            }
        }, 4000);
    }
    
    // Update indicators based on scroll position
    function updateIndicators() {
        const cardWidth = slider.querySelector('div').offsetWidth + 24;
        const currentIndex = Math.round(slider.scrollLeft / cardWidth);
        
        indicators.forEach((indicator, index) => {
            if (index === currentIndex) {
                indicator.classList.remove('bg-slate-300');
                indicator.classList.add('bg-slate-900', 'w-8');
            } else {
                indicator.classList.remove('bg-slate-900', 'w-8');
                indicator.classList.add('bg-slate-300');
            }
        });
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => scrollToSlide('prev'));
    nextBtn.addEventListener('click', () => scrollToSlide('next'));
    
    slider.addEventListener('scroll', updateIndicators);
    
    // Pause on hover
    slider.addEventListener('mouseenter', () => {
        isAutoScrolling = false;
    });
    
    slider.addEventListener('mouseleave', () => {
        isAutoScrolling = true;
    });
    
    // Start auto scroll
    startAutoScroll();
</script>
