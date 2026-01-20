<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Register as Tourist</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

        
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-green-200">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

           
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-green-200">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-green-200">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-green-200">
            </div>

            <button type="submit"
                    class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 font-semibold">
                Register
            </button>

            <p class="mt-4 text-sm text-center">
                Want to register as a beach owner instead?
                <a href="{{ route('register.owner') }}" class="text-blue-600 hover:underline font-semibold">
                    Register as Beach Owner
                </a>
            </p>

            <p class="mt-2 text-sm text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Login</a>
            </p>
        </form>
    </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Beach Tourism</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #14b8a6 100%);
        }

        .card-shadow {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .input-field {
            transition: all 0.3s ease;
        }

        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.2);
        }

        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.4);
        }

        .illustration {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl card-shadow overflow-hidden max-w-5xl w-full grid md:grid-cols-2">
        <!-- Registration Form Section -->
        <div class="p-8 md:p-12 flex flex-col justify-center">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Register as Tourist</h1>
                <p class="text-gray-500 text-sm">Start your beach adventure today</p>
            </div>

            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="input-field w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        placeholder="Enter your full name"
                    >
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="input-field w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        placeholder="Enter your email"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="input-field w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        placeholder="Create a password"
                    >
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        class="input-field w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        placeholder="Confirm your password"
                    >
                </div>

                <button
                    type="submit"
                    class="btn-primary w-full bg-gradient-to-r from-cyan-500 to-teal-500 text-white font-semibold py-3 px-6 rounded-lg hover:from-cyan-600 hover:to-teal-600"
                >
                    Register
                </button>
            </form>

            <div class="mt-6 space-y-2">
                <p class="text-center text-sm text-gray-600">
                    Want to register as a beach owner?
                    <a href="{{ route('register.owner') }}" class="text-cyan-600 hover:text-cyan-700 font-semibold">Beach Owner Registration</a>
                </p>
                <p class="text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 font-semibold">Login</a>
                </p>
            </div>
        </div>

        <!-- Illustration Section -->
        <div class="hidden md:flex bg-gradient-to-br from-cyan-50 to-teal-50 p-12 flex-col justify-center items-center relative overflow-hidden">
            <div class="illustration relative z-10">
                <svg width="300" height="300" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Beach Scene Illustration -->
                    <!-- Sun -->
                    <circle cx="240" cy="60" r="25" fill="#FDB022" opacity="0.9"/>
                    <circle cx="240" cy="60" r="30" fill="#FDB022" opacity="0.3"/>

                    <!-- Waves -->
                    <path d="M0 180 Q50 160 100 180 T200 180 T300 180 L300 300 L0 300 Z" fill="#06b6d4" opacity="0.3"/>
                    <path d="M0 200 Q50 185 100 200 T200 200 T300 200 L300 300 L0 300 Z" fill="#0ea5e9" opacity="0.4"/>
                    <path d="M0 220 Q50 205 100 220 T200 220 T300 220 L300 300 L0 300 Z" fill="#0284c7" opacity="0.5"/>

                    <!-- Beach -->
                    <ellipse cx="150" cy="160" rx="120" ry="30" fill="#fbbf24" opacity="0.4"/>

                    <!-- Palm Tree -->
                    <rect x="130" y="100" width="8" height="80" fill="#92400e" rx="2"/>
                    <path d="M134 105 Q110 90 100 100 Q105 95 134 105" fill="#16a34a"/>
                    <path d="M134 105 Q150 85 165 95 Q155 90 134 105" fill="#16a34a"/>
                    <path d="M134 110 Q115 100 110 115 Q115 105 134 110" fill="#16a34a"/>
                    <path d="M134 110 Q155 95 160 110 Q155 100 134 110" fill="#16a34a"/>

                    <!-- Beach Umbrella -->
                    <line x1="200" y1="140" x2="200" y2="180" stroke="#dc2626" stroke-width="3"/>
                    <path d="M170 140 Q200 120 230 140 Z" fill="#ef4444"/>
                    <path d="M175 140 Q200 125 225 140" stroke="#fff" stroke-width="2" fill="none"/>

                    <!-- Beach Ball -->
                    <circle cx="80" cy="195" r="15" fill="#fff"/>
                    <path d="M80 180 L80 210" stroke="#ef4444" stroke-width="3"/>
                    <path d="M65 195 L95 195" stroke="#3b82f6" stroke-width="3"/>
                    <circle cx="80" cy="195" r="15" stroke="#fbbf24" stroke-width="2" fill="none"/>

                    <!-- Surfboard -->
                    <ellipse cx="220" cy="195" rx="8" ry="25" fill="#0ea5e9" transform="rotate(-30 220 195)"/>
                    <ellipse cx="220" cy="195" rx="6" ry="23" fill="#06b6d4" transform="rotate(-30 220 195)"/>
                </svg>
            </div>

            <div class="mt-8 text-center relative z-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Join Our Beach Community</h2>
                <p class="text-gray-600 text-sm leading-relaxed max-w-sm">
                    Create your account and unlock access to exclusive beach destinations, personalized recommendations, and amazing travel experiences.
                </p>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-10 right-10 w-20 h-20 bg-cyan-400 rounded-full opacity-10"></div>
            <div class="absolute bottom-10 left-10 w-32 h-32 bg-teal-400 rounded-full opacity-10"></div>
        </div>
    </div>
</body>
</html>
