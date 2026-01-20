<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Office Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }

        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link:hover { transform: translateX(4px); }

        .sidebar-link.active {
            background: linear-gradient(135deg, #06b6d4 0%, #0ea5e9 100%);
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.3);
        }

        .card { transition: all 0.3s ease; }
        .card:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(0,0,0,0.1); }

        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #14b8a6 100%);
        }

        .logout-btn { transition: all 0.2s ease; }
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }

        .header-shadow { box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 antialiased">

<div id="backdrop" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden"></div>

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside id="sidebar"
           class="w-72 gradient-bg text-white flex flex-col shadow-2xl
                  fixed lg:static inset-y-0 left-0 z-50
                  transform -translate-x-full lg:translate-x-0
                  transition-transform duration-300">

        <button id="closeBtn" class="lg:hidden absolute top-4 right-4 text-white text-3xl leading-none">×</button>

        <div class="px-8 py-6 border-b border-white border-opacity-20">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Tourism Office</h2>
                    <p class="text-xs text-cyan-100 opacity-90">Admin Dashboard</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Links -->
        <nav class="flex-1 px-6 py-8 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl
                {{ request()->routeIs('admin.dashboard') ? 'active' : 'hover:bg-white hover:bg-opacity-10' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.beaches.index') }}"
               class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl
               {{ request()->routeIs('admin.beaches.*') ? 'active' : 'hover:bg-white hover:bg-opacity-10' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 21h18M3 7v1a3 3 0 003 3h12a3 3 0 003-3V7M3 7l2-2M3 7l2 2m16-2l-2-2m2 2l-2 2m-7 4h.01M12 17v.01"/>
                </svg>
                <span class="font-medium">Manage Beaches</span>
            </a>
        </nav>

        <!-- Bottom User + Logout -->
        <div class="px-6 py-6 border-t border-white border-opacity-20">
            <div class="mb-4 px-4 py-3 bg-white bg-opacity-10 rounded-lg">
                <p class="text-xs text-cyan-100 mb-1">Logged in as</p>
                <p class="font-semibold text-white truncate">{{ Auth::user()->name }}</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="logout-btn w-full flex items-center justify-center space-x-2 bg-red-500 hover:bg-red-600
                        px-4 py-3 rounded-lg text-sm font-semibold shadow-lg">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col">


        <!-- HEADER -->
        <header class="bg-white header-shadow px-8 py-5 flex justify-between items-center">

            <button id="openBtn" class="lg:hidden mr-3">
                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    @yield('title', 'Admin Dashboard')
                </h1>
                <p class="text-sm text-gray-500 mt-0 leading-none">Manage your beach tourism platform</p>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3 px-4 py-2 bg-gradient-to-r from-cyan-50 to-teal-50 rounded-lg">
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-teal-500
                                rounded-full flex items-center justify-center text-white font-bold shadow-md">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 px-8 pb-8 pt-0 overflow-x-hidden">
            @yield('content')
        </main>

    </div>
</div>

<!-- SIDEBAR SCRIPT -->
<script>
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('backdrop');
    const openBtn = document.getElementById('openBtn');
    const closeBtn = document.getElementById('closeBtn');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        backdrop.classList.remove('hidden');
        document.documentElement.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        backdrop.classList.add('hidden');
        document.documentElement.style.overflow = '';
    }

    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    backdrop.addEventListener('click', closeSidebar);
</script>

</body>
</html>
