<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beach Owner Dashboard</title>
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
    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.1);
    }

    .gradient-bg {
      background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #14b8a6 100%);
    }

    .logout-btn { transition: all 0.2s ease; }
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    .header-shadow { box-shadow: 0 1px 3px rgba(0,0,0,0.05); }

    @keyframes slideIn {
      from { opacity: 0; transform: translateX(-20px); }
      to   { opacity: 1; transform: translateX(0); }
    }
    .nav-item { animation: slideIn 0.3s ease forwards; }
    .nav-item:nth-child(1) { animation-delay: 0.1s; }
    .nav-item:nth-child(2) { animation-delay: 0.2s; }
    .nav-item:nth-child(3) { animation-delay: 0.3s; }
    .nav-item:nth-child(4) { animation-delay: 0.4s; }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 antialiased">

  <!-- Backdrop for mobile -->
  <div id="backdrop" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden" aria-hidden="true"></div>

  <div class="flex h-screen">

    <!-- Sidebar (keeps original design) -->
    <aside id="sidebar"
      class="w-72 gradient-bg text-white flex flex-col shadow-2xl
             fixed lg:static inset-y-0 left-0 z-50
             transform -translate-x-full lg:translate-x-0
             transition-transform duration-300">

      <!-- Close button (mobile only) -->
      <button id="closeBtn" class="lg:hidden absolute top-4 right-4 text-white text-3xl leading-none" aria-label="Close sidebar">×</button>

      <!-- Logo/Brand -->
      <div class="px-8 py-6 border-b border-white border-opacity-20">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 21h18M3 7v1a3 3 0 003 3h12a3 3 0 003-3V7M3 7l2-2M3 7l2 2m16-2l-2-2m2 2l-2 2m-7 4h.01M12 17v.01" />
            </svg>
          </div>
          <div>
            <h2 class="text-xl font-bold">BeachGuide</h2>
            <p class="text-xs text-cyan-100 opacity-90">Owner Dashboard</p>
          </div>
        </div>
      </div>

      <!-- Navigation (unchanged markup and classes) -->
      <nav class="flex-1 px-6 py-8 space-y-2">
        <a href="{{ route('owner.dashboard') }}"
           class="nav-item sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('owner.dashboard') ? 'active' : 'hover:bg-white hover:bg-opacity-10' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span class="font-medium">Dashboard</span>
        </a>

        <a href="{{ route('owner.beaches.index') }}"
           class="nav-item sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('owner.beaches.*') ? 'active' : 'hover:bg-white hover:bg-opacity-10' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 21h18M3 7v1a3 3 0 003 3h12a3 3 0 003-3V7M3 7l2-2M3 7l2 2m16-2l-2-2m2 2l-2 2m-7 4h.01M12 17v.01" />
          </svg>
          <span class="font-medium">My Beaches</span>
        </a>
       @php
    $currentBeach = \App\Models\Beach::where('owner_id', Auth::id())->first();
@endphp

@if($currentBeach)
<a href="{{ route('owner.beaches.contacts.index', $currentBeach) }}"
   class="nav-item sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl
   {{ request()->routeIs('owner.beaches.contacts.*') ? 'active' : 'hover:bg-white hover:bg-opacity-10' }}">
  
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A9 9 0 1119.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0zM7 21a5 5 0 0110 0" />
    </svg>

    <span class="font-medium">Contacts</span>
</a>
@endif


        <a href="{{ route('owner.reviews.index') }}"
           class="nav-item sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white hover:bg-opacity-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
          </svg>
          <span class="font-medium">Reviews</span>
        </a>
      </nav>

      <!-- User Info & Logout (unchanged) -->
      <div class="px-6 py-6 border-t border-white border-opacity-20">
        <div class="mb-4 px-4 py-3 bg-white bg-opacity-10 rounded-lg">
          <p class="text-xs text-cyan-100 mb-1">Logged in as</p>
          <p class="font-semibold text-white truncate">{{ Auth::user()->name }}</p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
                  class="logout-btn w-full flex items-center justify-center space-x-2 bg-red-500 hover:bg-red-600 px-4 py-3 rounded-lg text-sm font-semibold shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </aside>

    <!-- Main content area -->
    <div class="flex-1 flex flex-col">
      
      <header class="bg-white header-shadow px-8 py-5 flex justify-between items-center">
        <!-- Hamburger button (mobile only) -->
        <button id="openBtn" class="lg:hidden mr-3" aria-label="Open sidebar">
          <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <div>
          <h1 class="text-2xl font-bold text-gray-800">
            Hello! {{ Auth::user()->name }}
          </h1>
        </div>

        <div class="flex items-center space-x-4">
          <div class="flex items-center space-x-3 px-4 py-2 bg-gradient-to-r from-cyan-50 to-teal-50 rounded-lg">
            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold shadow-md">
              {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
              <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
              <p class="text-xs text-gray-500">Beach Owner</p>
            </div>
          </div>
        </div>
      </header>

      <main class="flex-1 p-8 overflow-y-auto">
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    // element references
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('backdrop');
    const openBtn = document.getElementById('openBtn');
    const closeBtn = document.getElementById('closeBtn');

    // open sidebar (mobile)
    openBtn && openBtn.addEventListener('click', () => {
      sidebar.classList.remove('-translate-x-full');
      backdrop.classList.remove('hidden');
      // prevent body scroll when sidebar open
      document.documentElement.style.overflow = 'hidden';
    });

    // close sidebar (mobile)
    const closeSidebar = () => {
      sidebar.classList.add('-translate-x-full');
      backdrop.classList.add('hidden');
      document.documentElement.style.overflow = '';
    };

    closeBtn && closeBtn.addEventListener('click', closeSidebar);
    backdrop && backdrop.addEventListener('click', closeSidebar);

    // ensure proper state on resize (if user resizes from mobile -> desktop)
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        // on desktop ensure sidebar is visible and no backdrop
        sidebar.classList.remove('-translate-x-full');
        backdrop.classList.add('hidden');
        document.documentElement.style.overflow = '';
      } else {
        // on mobile initially hide sidebar
        if (!backdrop.classList.contains('hidden')) return; // if already open, leave as-is
        sidebar.classList.add('-translate-x-full');
      }
    });
  </script>

</body>
</html>
