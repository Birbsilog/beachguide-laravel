{{-- resources/views/weather.blade.php --}}
@extends('layouts.app')

@section('title', 'Weather Forecast - BeachGuide Catanduanes')

@push('styles')

<style>
    .hero-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #0d9488 50%, #0891b2 100%);
    }
    .weather-card-hover:hover {
        transform: translateY(-2px);
    }
    .weather-day.selected div {
        border-color: #0d9488 !important;
        background: linear-gradient(135deg, #0d9488 0%, #0891b2 100%);
        color: white;
    }
    .weather-day.selected div span {
        color: white;
    }
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
</style>
@endpush

@section('content')
<body class="min-h-screen bg-gradient-to-b from-sky-50 to-white">

    <!-- Hero Section -->
    <section class="relative hero-gradient text-white py-16 px-4">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="relative max-w-4xl mx-auto text-center">
            <div class="flex items-center justify-center mb-6">
                <svg class="w-12 h-12 mr-3 text-cyan-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                </svg>
                <h1 class="text-4xl md:text-5xl font-bold">Weather Forecast</h1>
            </div>
            <p class="text-xl md:text-2xl mb-6 text-cyan-100">
                5-Day Weather Forecast for Virac, Catanduanes
            </p>
            <p class="text-lg max-w-2xl mx-auto leading-relaxed">
                Plan your perfect beach day with accurate weather predictions for the beautiful island of Catanduanes
            </p>
        </div>
    </section>

    <!-- Weather Forecast Section -->
    <section class="py-16 px-4" id="weather-section">
        <div class="max-w-6xl mx-auto">
            <!-- Current Location Info -->
            <div class="text-center mb-12">
                <div class="bg-white rounded-xl shadow-md p-6 max-w-md mx-auto border border-gray-100">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Virac, Catanduanes</h3>
                    </div>
                    
                </div>
            </div>

            <!-- Day Selector -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-800 text-center mb-6">Select a Day</h3>
                <div id="day-selector" class="flex justify-center space-x-3 overflow-x-auto pb-2">
                    <!-- Loading state -->
                    <div class="flex space-x-3">
                        <div class="loading-shimmer rounded-lg h-20 w-16"></div>
                        <div class="loading-shimmer rounded-lg h-20 w-16"></div>
                        <div class="loading-shimmer rounded-lg h-20 w-16"></div>
                        <div class="loading-shimmer rounded-lg h-20 w-16"></div>
                        <div class="loading-shimmer rounded-lg h-20 w-16"></div>
                    </div>
                </div>
            </div>

            <!-- Weather Details Card -->
            <div class="max-w-4xl mx-auto">
                <div id="weather-details" class="text-white rounded-2xl p-8 shadow-lg hero-gradient">

                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <!-- Main Weather Info -->
                        <div id="weather-main" class="mb-6 md:mb-0 text-center md:text-left">
                            <div class="flex items-center justify-center md:justify-start space-x-4 mb-4">
                                <span id="temp" class="text-6xl font-bold">--°</span>
                                <img id="icon" src="" alt="" class="h-16 w-16">
                            </div>
                            <div class="text-xl mb-2" id="description">Loading weather data...</div>
                            <div class="text-lg opacity-90" id="temps">H: --° L: --°</div>
                        </div>

                        <!-- Weather Meta Info -->
                        <div id="weather-meta" class="text-center md:text-right space-y-3">
                            <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur-sm">
                                <h4 class="text-sm font-semibold mb-3 opacity-90">Today's Details</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center justify-between">
                                        <span class="flex items-center">
                                            <span class="mr-2">🌅</span> Sunrise
                                        </span>
                                        <span id="sunrise" class="font-medium">--:--</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="flex items-center">
                                            <span class="mr-2">🌇</span> Sunset
                                        </span>
                                        <span id="sunset" class="font-medium">--:--</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="flex items-center">
                                            <span class="mr-2">💧</span> Humidity
                                        </span>
                                        <span id="humidity" class="font-medium">--%</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="flex items-center">
                                            <span class="mr-2">💨</span> Wind
                                        </span>
                                        <span id="wind" class="font-medium">-- km/h</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>
@endsection

@push('scripts')
<script>
    async function fetchWeather() {
        try {
            document.getElementById('day-selector').innerHTML = '';
            const response = await fetch(`/api/weather?lat=13.5812&lon=124.2372`);
            const data = await response.json();
            const forecastList = data.list.filter((item, index) => index % 8 === 0).slice(0, 5);

            const daySelector = document.getElementById('day-selector');

            function updateMainWeather(day) {
                document.getElementById('temp').textContent = `${Math.round(day.main.temp)}°`;
                document.getElementById('icon').src = `https://openweathermap.org/img/wn/${day.weather[0].icon}@2x.png`;
                document.getElementById('description').textContent = day.weather[0].description.charAt(0).toUpperCase() + day.weather[0].description.slice(1);
                document.getElementById('temps').textContent = `H: ${Math.round(day.main.temp_max)}° L: ${Math.round(day.main.temp_min)}°`;
                document.getElementById('humidity').textContent = `${day.main.humidity}%`;
                document.getElementById('wind').textContent = `${Math.round(day.wind.speed * 3.6)} km/h`;
                document.getElementById('sunrise').textContent = '5:28 AM';
                document.getElementById('sunset').textContent = '6:27 PM';
            }

            forecastList.forEach((day, i) => {
                const date = new Date(day.dt_txt);
                const weekday = date.toLocaleDateString('en-US', { weekday: 'short' });
                const dayNum = date.getDate();
                const month = date.toLocaleDateString('en-US', { month: 'short' });

                const button = document.createElement('button');
                button.innerHTML = `
                    <div class="flex flex-col items-center py-4 px-5 rounded-lg border-2 border-gray-200 transition-all duration-200 hover:border-teal-300 hover:shadow-md bg-white">
                        <span class="text-sm text-gray-500 font-medium">${weekday}</span>
                        <span class="text-xl font-bold text-gray-800">${dayNum}</span>
                        <span class="text-xs text-gray-400">${month}</span>
                    </div>
                `;
                button.classList.add('weather-day', 'weather-card-hover');
                if (i === 0) button.classList.add('selected');

                button.addEventListener('click', () => {
                    document.querySelectorAll('.weather-day').forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                    updateMainWeather(day);
                });

                daySelector.appendChild(button);
            });

            updateMainWeather(forecastList[0]);
        } catch (error) {
            console.error('Weather fetch error:', error);
            document.getElementById('weather-section').innerHTML = `
                <div class="text-center py-16">
                    <div class="bg-red-50 border border-red-200 rounded-xl p-8 max-w-md mx-auto">
                        <svg class="w-12 h-12 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M5.062 20h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-red-800 mb-2">Weather Data Unavailable</h3>
                        <p class="text-red-600">Unable to load weather forecast. Please try again later.</p>
                    </div>
                </div>
            `;
        }
    }

    document.addEventListener('DOMContentLoaded', fetchWeather);
</script>
@endpush


