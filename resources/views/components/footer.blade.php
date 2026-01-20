<footer class="bg-gray-100 border-t mt-16 text-sm text-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- About -->
        <div>
            <h4 class="text-base font-semibold text-gray-900 mb-2">About BeachGuide</h4>
            <p class="text-gray-600">
                Your companion for discovering the best beaches in Catanduanes. Powered by locals, weather data, and smart technology.
            </p>
        </div>

        <!-- Navigation Links -->
        <div>
            <h4 class="text-base font-semibold text-gray-900 mb-2">Quick Links</h4>
            <ul class="space-y-1">
                <li><a href="#explore" class="hover:underline">Explore</a></li>
                <li><a href="#weather" class="hover:underline">Weather</a></li>
                <li><a href="#about" class="hover:underline">About</a></li>
                <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
            </ul>
        </div>

        <!-- Social Media -->
        <div>
            <h4 class="text-base font-semibold text-gray-900 mb-2">Follow Us</h4>
            <ul class="space-y-1">
                <li><a href="#" class="hover:underline">Facebook</a></li>
                <li><a href="#" class="hover:underline">Instagram</a></li>
                <li><a href="#" class="hover:underline">YouTube</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div>
            <h4 class="text-base font-semibold text-gray-900 mb-2">Newsletter</h4>
            <p class="text-gray-600 mb-2">Stay updated on the latest beach destinations.</p>
            <form>
                <input type="email" placeholder="Your email"
                    class="w-full p-2 border rounded text-sm mb-2 focus:outline-none focus:ring focus:ring-blue-200">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-3 rounded hover:bg-blue-700">Subscribe</button>
            </form>
        </div>
    </div>

    <div class="border-t text-center text-gray-500 text-xs py-4">
        &copy; {{ date('Y') }} BeachGuide. All rights reserved.
    </div>
</footer>
