document.addEventListener('DOMContentLoaded', () => {
    const weatherDetails = document.getElementById('weather-details');
    const daySelector = document.getElementById('day-selector');

    async function fetchWeather() {
        try {
            // Call your Laravel API route
            const response = await fetch(`/api/weather?lat=13.5812&lon=124.2372`);
            const data = await response.json();

            if (!data || !data.daily) {
                throw new Error("Invalid weather data received.");
            }

            renderDayButtons(data.daily);
            renderWeatherCards(data.daily[0]); // show first day by default
        } catch (error) {
            console.error("Weather fetch error:", error);
            weatherDetails.innerHTML = `<p style="color: #fff;">Failed to load weather data.</p>`;
        }
    }

    function renderDayButtons(days) {
        daySelector.innerHTML = "";
        days.forEach((day, index) => {
            const btn = document.createElement("button");
            btn.textContent = new Date(day.dt * 1000).toLocaleDateString("en-US", { weekday: "short" });
            if (index === 0) btn.classList.add("active");

            btn.addEventListener("click", () => {
                document.querySelectorAll("#day-selector button").forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                renderWeatherCards(day);
            });

            daySelector.appendChild(btn);
        });
    }

    function renderWeatherCards(day) {
        weatherDetails.innerHTML = "";

        // Example: show morning, afternoon, evening temps
        const times = ["morn", "day", "eve"];
        times.forEach(time => {
            const card = document.createElement("div");
            card.className = "weather-card";

            card.innerHTML = `
                <h3>${time.charAt(0).toUpperCase() + time.slice(1)}</h3>
                <img src="https://openweathermap.org/img/wn/${day.weather[0].icon}@2x.png" alt="Weather icon">
                <p>${day.temp[time]}°C</p>
                <p>${day.weather[0].description}</p>
            `;

            weatherDetails.appendChild(card);
        });
    }

    fetchWeather();
});
