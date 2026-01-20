<style>
    .hero-background {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 50, 80, 0.4) 100%);
    }

    .beach-image {
        background-image: url('{{ asset('images/main.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    @media (max-width: 768px) {
        .beach-image {
            background-attachment: scroll;
        }
    }

    .search-input::placeholder {
        color: #a0aec0;
    }

    .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
    }

    .btn-search {
        transition: all 0.3s ease;
    }

    .btn-search:hover {
        background-color: #16a34a;
        box-shadow: 0 10px 25px rgba(34, 197, 94, 0.2);
    }

    .btn-search:active {
        transform: translateY(1px);
    }

    .floating-people {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    .heading-text {
        text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.3);
        letter-spacing: -0.5px;
    }

    @media (max-width: 640px) {
        .heading-text {
            font-size: 1.875rem;
        }
    }
</style>

<div class="beach-image relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="hero-background absolute inset-0 z-10"></div>

    <div class="relative z-20 w-full px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-center">
        <h1 class="heading-text text-white text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Discover the Beautiful<br class="hidden sm:block" /> Beaches of Catanduanes
        </h1>

        {{-- SEARCH FORM --}}
        <form  
            action="{{ route('search') }}" 
            method="GET"
            class="mt-10 flex flex-col sm:flex-row gap-2 justify-center w-full mx-auto max-w-lg"
        >

            <input 
                type="text" 
                name="query" 
                class="search-input flex-1 px-6 py-3 rounded-lg sm:rounded-l-lg sm:rounded-r-none text-gray-800 placeholder-gray-500 text-sm sm:text-base focus:ring-2 focus:ring-green-500"
                placeholder="Search for a beach..."
                required
            >
            <button 
                type="submit"
                class="btn-search bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3 rounded-lg sm:rounded-l-none sm:rounded-r-lg transition duration-300 text-sm sm:text-base whitespace-nowrap"
            >
                Search
            </button>
            
        </form>
        @if (session('error'))
    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
        {{ session('error') }}
    </div>
@endif
    </div>
</div>

