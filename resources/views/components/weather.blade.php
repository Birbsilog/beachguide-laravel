<!-- <section class="py-16 bg-white" id="weather-section">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">5-Day Weather Forecast - Virac</h2>

        <div id="weather-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6 text-center">
       
        </div>
    </div>
</section>

<script>
    const apiKey = "{{ env('OPENWEATHER_API_KEY') }}"; 

    async function fetchWeather() {
        try {
            const response = await fetch(`/api/weather?lat=13.5812&lon=124.2372`);
            const data = await response.json();

            const forecastList = data.list.filter((item, index) => index % 8 === 0); 
            const container = document.getElementById('weather-container');
            container.innerHTML = ''; 

            forecastList.forEach(day => {
                const date = new Date(day.dt_txt).toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
                const icon = day.weather[0].icon;
                const description = day.weather[0].description;
                const temp = day.main.temp;

                container.innerHTML += `
                    <div class="bg-blue-100 rounded-lg p-4 shadow text-blue-800">
                        <div class="text-lg font-semibold">${date}</div>
                        <img src="https://openweathermap.org/img/wn/${icon}@2x.png" alt="${description}" class="mx-auto h-16">
                        <div class="text-sm capitalize">${description}</div>
                        <div class="mt-2 font-bold text-xl">${Math.round(temp)}°C</div>
                    </div>
                `;
            });

        } catch (err) {
            document.getElementById('weather-container').innerHTML =
                '<p class="text-red-600 col-span-5">Failed to load weather data.</p>';
        }
    }

    fetchWeather();
</script> -->
<!-- resources/views/components/weather.blade.php -->
<section class="py-16 bg-white" id="weather-section">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">5-Day Weather Forecast - Virac</h2>

        <!-- Day Selector -->
        <div id="day-selector" class="flex justify-center space-x-4 overflow-x-auto mb-8">
            <!-- JS will populate days here -->
        </div>

        <!-- Weather Details Card -->
        <div id="weather-details" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl p-6 md:flex justify-between items-center shadow-md max-w-4xl mx-auto">
            <!-- JS will populate content here -->
            <div id="weather-main" class="mb-4 md:mb-0">
                <div class="text-5xl font-bold flex items-center space-x-2">
                    <span id="temp">--°</span>
                    <img id="icon" src="" alt="" class="h-12">
                </div>
                <div class="text-lg" id="description">Loading...</div>
                <div class="text-sm mt-1" id="temps">H: --° L: --°</div>
            </div>

            <div id="weather-meta" class="text-sm text-right space-y-1">
                <div><span class="inline-block mr-2">🌅</span> <span id="sunrise">--:--</span></div>
                <div><span class="inline-block mr-2">🌇</span> <span id="sunset">--:--</span></div>
                <div><span class="inline-block mr-2">💧</span> <span id="humidity">--%</span></div>
            </div>
        </div>
    </div>
</section>

<script>
    async function fetchWeather() {
        try {
            const response = await fetch(`/api/weather?lat=13.5812&lon=124.2372`);
            const data = await response.json();
            const forecastList = data.list.filter((item, index) => index % 8 === 0).slice(0, 5); // Only 5 days

            const daySelector = document.getElementById('day-selector');

            function updateMainWeather(day) {
                document.getElementById('temp').textContent = `${Math.round(day.main.temp)}°`;
                document.getElementById('icon').src = `https://openweathermap.org/img/wn/${day.weather[0].icon}@2x.png`;
                document.getElementById('description').textContent = day.weather[0].description;
                document.getElementById('temps').textContent = `H: ${Math.round(day.main.temp_max)}° L: ${Math.round(day.main.temp_min)}°`;
                document.getElementById('humidity').textContent = `${day.main.humidity}%`;
                document.getElementById('sunrise').textContent = '5:28 am';
                document.getElementById('sunset').textContent = '6:27 pm';
            }

            forecastList.forEach((day, i) => {
                const date = new Date(day.dt_txt);
                const weekday = date.toLocaleDateString('en-US', { weekday: 'short' });
                const dayNum = date.getDate();

                const button = document.createElement('button');
                button.innerHTML = `
                    <div class="flex flex-col items-center py-3 px-5 rounded-md border border-gray-300 transition duration-200">
                        <span class="text-sm text-gray-500">${weekday}</span>
                        <span class="text-lg font-semibold">${dayNum}</span>
                    </div>
                `;
                button.classList.add('weather-day');
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
            document.getElementById('weather-section').innerHTML = `<p class="text-center text-red-600">Failed to load weather data.</p>`;
        }
    }

    // Add border highlight styling
    document.addEventListener('DOMContentLoaded', () => {
        const style = document.createElement('style');
        style.innerHTML = `
            .weather-day.selected div {
                border-color: #1f2937 !important; /* gray-800 */
                box-shadow: 0 0 0 1px #1f2937;
            }
        `;
        document.head.appendChild(style);
        fetchWeather();
    });
</script>
