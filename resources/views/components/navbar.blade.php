<div class="bg-gray-100 font-sans w-full">
    <div class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600">BeachGuide</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-800 text-sm font-semibold hover:text-blue-600">Home</a>
                    <a href="{{ route('explore') }}" class="text-gray-800 text-sm font-semibold hover:text-blue-600">Explore</a>
                    <a href="{{ route('weather') }}" class="text-gray-800 text-sm font-semibold hover:text-blue-600">Weather</a>
                    <a href="{{ route('about') }}" class="text-gray-800 text-sm font-semibold hover:text-blue-600">About</a>
                </div>

                <!-- Auth Buttons (Desktop) -->
                <div class="hidden sm:flex sm:items-center">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-800 text-sm font-semibold hover:text-blue-600 mr-4">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="text-gray-800 text-sm font-semibold border px-4 py-2 rounded-lg hover:text-blue-600 hover:border-blue-600">
                            Sign Up
                        </a>
                    @else
                        <span class="text-gray-800 text-sm font-semibold mr-4">
                            Hello, {{ Auth::user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-sm text-red-600 font-semibold hover:underline">Logout</button>
                        </form>
                    @endguest
                </div>

                <!-- Mobile Menu Button -->
                <div class="sm:hidden cursor-pointer" id="menu-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-blue-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </div>

            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu" class="hidden sm:hidden bg-white border-t py-2">
                <div class="flex flex-col px-2">

                    <a href="{{ route('home') }}" class="py-2 text-gray-800 font-semibold hover:text-blue-600">Home</a>
                    <a href="{{ route('explore') }}" class="py-2 text-gray-800 font-semibold hover:text-blue-600">Explore</a>
                    <a href="{{ route('weather') }}" class="py-2 text-gray-800 font-semibold hover:text-blue-600">Weather</a>
                    <a href="{{ route('about') }}" class="py-2 text-gray-800 font-semibold hover:text-blue-600">About</a>

                    <div class="border-t mt-2 pt-2 flex justify-between items-center">
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-800 font-semibold hover:text-blue-600">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                               class="border px-4 py-1 rounded-lg font-semibold hover:text-blue-600 hover:border-blue-600">
                                Sign Up
                            </a>
                        @else
                            <span class="font-semibold text-gray-800">
                                Hello, {{ Auth::user()->name }}
                            </span>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="text-red-600 font-semibold hover:underline">Logout</button>
                            </form>
                        @endguest
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Mobile Menu Toggle Script -->
<script>
    const toggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    toggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
