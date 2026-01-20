<!-- <!DOCTYPE html>
<html>
<head>
    <title>Explore Catanduanes Beaches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 90vh;
            width: 100%;
        }

        .popup-img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center; margin: 10px;">Explore Catanduanes Beaches</h2>
<div id="map"></div>


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([13.5862, 124.2433], 13); 

   
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    const beaches = @json($beaches);

    beaches.forEach(beach => {
        if (beach.latitude && beach.longitude) {
            const marker = L.marker([beach.latitude, beach.longitude]).addTo(map);

            const popupContent = `
                <img src="/images/beaches/${beach.image}" alt="${beach.name}" class="popup-img">
                <strong>${beach.name}</strong><br>
                <p>${beach.description}</p>
                <small>Double-click for full info</small>
            `;

            marker.bindPopup(popupContent);

            marker.on('dblclick', () => {
                window.location.href = `/beaches/${beach.id}`;
            });
        }
    });
</script>

</body>
</html> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Catanduanes Beaches</title>

    
    <script src="https://cdn.tailwindcss.com"></script>

 
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 90vh;
            width: 100%;
        }

        .popup-img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">

   
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
           
            <a href="/" class="text-2xl font-bold text-blue-600">
                BeachGuide
            </a>

           
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('explore') }}" class="text-gray-700 hover:text-blue-600 font-medium">Explore</a>
                <a href="#weather" class="text-gray-700 hover:text-blue-600 font-medium">Weather</a>
                <a href="#about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
            </div>

           
            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-medium">Sign Up</a>
                @else
                    <span class="text-sm text-gray-700 font-medium">Hello, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="ml-2 text-sm text-red-600 hover:underline font-medium">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

   
    <h2 class="text-center text-xl font-semibold text-gray-800 mt-4 mb-2">Explore Catanduanes Beaches</h2>

 
    <div id="map"></div>

   
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([13.5862, 124.2433], 11); 

        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        const beaches = @json($beaches);

        beaches.forEach(beach => {
            if (beach.latitude && beach.longitude) {
                const marker = L.marker([beach.latitude, beach.longitude]).addTo(map);

                const popupContent = `
                    <img src="/images/beaches/${beach.image}" alt="${beach.name}" class="popup-img">
                    <strong>${beach.name}</strong><br>
                    <p>${beach.description}</p>
                    <small>Double-click for full info</small>
                `;

                marker.bindPopup(popupContent);

                marker.on('dblclick', () => {
                    window.location.href = `/beaches/${beach.id}`;
                });
            }
        });
    </script>

</body>
</html> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Catanduanes Beaches</title>

    
    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 90vh;
            width: 100%;
        }

        .popup-img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">


    <nav class="bg-white shadow-md sticky top-0 z-50">
        <
            <a href="/" class="text-2xl font-bold text-blue-600">
                BeachGuide
            </a>

           
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('explore') }}" class="text-gray-700 hover:text-blue-600 font-medium">Explore</a>
                <a href="#weather" class="text-gray-700 hover:text-blue-600 font-medium">Weather</a>
                <a href="#about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
            </div>

           
            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-medium">Sign Up</a>
                @else
                    <span class="text-sm text-gray-700 font-medium">Hello, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="ml-2 text-sm text-red-600 hover:underline font-medium">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <div id="map"></div>

   
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([13.5862, 124.2433], 11); /

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        const beaches = @json($beaches);

        beaches.forEach(beach => {
            if (beach.latitude && beach.longitude) {
                const marker = L.marker([beach.latitude, beach.longitude]).addTo(map);

               
                const imageUrl = beach.image_path 
                    ? `/${beach.image_path}` 
                    : '/images/default.jpg';

                const popupContent = `
                    <img src="${imageUrl}" alt="${beach.name}" class="popup-img">
                    <strong>${beach.name}</strong><br>
                    <p>${beach.description ?? ''}</p>
                    <small>Double-click for full info</small>
                `;

                marker.bindPopup(popupContent);

                marker.on('dblclick', () => {
                    window.location.href = `/beaches/${beach.id}`;
                });
            }
        });
    </script>

</body>
</html> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Catanduanes Beaches</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 90vh;
            width: 100%;
        }

        .popup-img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">

  
    <nav class="bg-white shadow-md sticky top-0 z-50 px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-blue-600">
            BeachGuide
        </a>

        <div class="hidden md:flex space-x-6">
            <a href="{{ route('explore') }}" class="text-gray-700 hover:text-blue-600 font-medium">Explore</a>
            <a href="#weather" class="text-gray-700 hover:text-blue-600 font-medium">Weather</a>
            <a href="#about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
        </div>

        <div class="space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline font-medium">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-medium">Sign Up</a>
            @else
                <span class="text-sm text-gray-700 font-medium">Hello, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 text-sm text-red-600 hover:underline font-medium">Logout</button>
                </form>
            @endguest
        </div>
    </nav>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([13.5862, 124.2433], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        const beaches = @json($beaches);

        beaches.forEach(beach => {
            if (beach.latitude && beach.longitude) {
                const marker = L.marker([beach.latitude, beach.longitude]).addTo(map);

           
                const imageUrl = beach.image_path 
                    ? `{{ asset('storage') }}/${beach.image_path}` 
                    : `{{ asset('images/default.jpg') }}`;

                const popupContent = `
                    <img src="${imageUrl}" alt="${beach.name}" class="popup-img">
                    <strong>${beach.name}</strong><br>
                    <p>${beach.description ?? ''}</p>
                    <small>Double-click for full info</small>
                `;

                marker.bindPopup(popupContent);

                marker.on('dblclick', () => {
                    window.location.href = `/beaches/${beach.id}`;
                });
            }
        });
    </script>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Catanduanes Beaches</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 90vh;
            width: 100%;
        }

        .popup-img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <!-- <nav class="bg-white shadow-md sticky top-0 z-50 px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-blue-600">
            BeachGuide
        </a>

        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
            <a href="{{ route('explore') }}" class="text-gray-700 hover:text-blue-600 font-medium">Explore</a>
            <a href="{{ route('weather') }}" class="text-gray-700 hover:text-blue-600 font-medium">Weather</a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
        </div>

        <div class="space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline font-medium">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-medium">Sign Up</a>
            @else
                <span class="text-sm text-gray-700 font-medium">Hello, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 text-sm text-red-600 hover:underline font-medium">Logout</button>
                </form>
            @endguest
        </div>
    </nav> -->
        @include('components.navbar')
    <!-- Map -->
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Init map
        const map = L.map('map').setView([13.5862, 124.2433], 12);

        // Disable double-click zoom (we’ll use double-click for redirect instead)
        map.doubleClickZoom.disable();

        // Tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 15,
        }).addTo(map);

        // Beaches from backend
        const beaches = @json($beaches);

        beaches.forEach(beach => {
            if (beach.latitude && beach.longitude) {
                const marker = L.marker([beach.latitude, beach.longitude]).addTo(map);

                // Beach image (default fallback)
                const imageUrl = beach.image_path 
                    ? `{{ asset('storage') }}/${beach.image_path}` 
                    : `{{ asset('images/default.jpg') }}`;

                // Popup content
                const popupContent = `
                    <div class="text-center">
                        <img src="${imageUrl}" alt="${beach.name}" class="popup-img">
                        <h4 class="font-semibold text-gray-800">${beach.name}</h4>
                        <p class="text-gray-600 text-sm">${beach.description ?? ''}</p>
                        <p class="text-blue-600 text-xs mt-2 font-medium">Double-click pin for full details</p>
                    </div>
                `;

                marker.bindPopup(popupContent);

                // Redirect to beach details on double-click
                marker.on('dblclick', () => {
                    window.location.href = `/beaches/${beach.id}`;
                });
            }
        });
    </script>

</body>
</html>
