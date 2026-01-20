{{-- resources/views/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BeachGuide — Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded shadow max-w-md w-full text-center">
        <h1 class="text-3xl font-bold mb-6 text-blue-700">Welcome to BeachGuide</h1>

        <p class="mb-6 text-gray-700">Choose your registration type:</p>

        <div class="space-y-4">
            <a href="{{ route('register') }}"
               class="block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                Register as Tourist
            </a>

            <a href="{{ route('register.owner') }}"
               class="block bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                Register as Beach Owner
            </a>

            <a href="{{ route('login') }}"
               class="block text-sm text-gray-600 underline hover:text-gray-800 mt-4">
                Already have an account? Log in
            </a>
        </div>
    </div>
   
    

</body>
</html>
