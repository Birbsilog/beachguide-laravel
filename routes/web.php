<?php

// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Http;
// use Inertia\Inertia;
// use App\Http\Controllers\ChatbotController;

// use App\Http\Controllers\ExploreController;

// use App\Http\Controllers\BeachController;


// Route::get('/home', function () {
//     return view('home');
// })->name('home');


// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');


// Route::get('/owner/dashboard', function () {
//     return view('owner.dashboard');
// })->name('owner.dashboard');




// Route::get('/beaches', [BeachController::class, 'index'])->name('beaches.index');
// Route::post('/beaches', [BeachController::class, 'store'])->name('beaches.store');
// Route::get('/beaches/{id}/image', [BeachController::class, 'showImage'])->name('beaches.image');




// Route::get('/explore', [ExploreController::class, 'index'])->name('explore');



// Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


// Homepage (You can change this to a Blade file if not using Inertia)
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
// Route::get('/', function () {
//     return view('home'); 
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// Route::get('/register', function () {
//     return view('auth.register-tourist'); 
// })->name('register'); // ⚠️ 
// Route::post('/register', [RegisteredUserController::class, 'storeTourist'])
//     ->middleware('guest')
//     ->name('register.submit');


// Route::get('/register/owner', function () {
//     return view('auth.register-owner');
// })->middleware('guest')->name('register.owner');

// Route::post('/register/owner', [RegisteredUserController::class, 'storeOwner'])
//     ->middleware('guest')
//     ->name('register.owner.submit');


// Route::get('/api/weather', function () {
//     $lat = request('lat', '13.5812');
//     $lon = request('lon', '124.2372');
//     $apiKey = env('OPENWEATHER_API_KEY');

//     $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
//         'lat' => $lat,
//         'lon' => $lon,
//         'appid' => $apiKey,
//         'units' => 'metric',
//     ]);

//     return $response->json();
// });

// Route::get('/beaches', function () {
//     /
//     return view('beaches.index'); 
// })->name('beaches.index');

// require __DIR__.'/auth.php';

// Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/process', [ChatbotController::class, 'process'])->name('chatbot.process');

// Route::post('/chatbot/process', [\App\Http\Controllers\ChatbotController::class, 'process'])->name('chatbot.process');


// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\ExploreController;
// use App\Http\Controllers\BeachController;
// use App\Http\Controllers\ChatbotController;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Http;
// use App\Http\Controllers\OwnerDashboardController;

// use App\Http\Controllers\InquiryController;

// use App\Http\Controllers\DashboardController;

// Route::middleware(['auth', 'role:beach_owner'])->group(function () {
//     Route::get('/owner/dashboard', [DashboardController::class, 'index'])->name('owner.dashboard');
// });


// Route::middleware(['auth'])->group(function () {
   
//     Route::post('/beaches/{beach}/inquiries', [InquiryController::class, 'store'])
//         ->name('inquiries.store');

   
//     Route::get('/owner/inquiries', [InquiryController::class, 'index'])
//         ->name('owner.inquiries');
// });



// Route::middleware(['auth', 'verified', 'role:beach_owner'])->group(function () {
//     Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])
//         ->name('beach_owner.dashboard'); 
// });




// Route::get('/', function () {
//     return view('home');  
// })->name('home');


// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard');   
//     })->middleware('role:admin')->name('admin.dashboard');

//     Route::get('/owner/dashboard', function () {
//         return view('beach_owner.dashboard');
//     })->middleware('role:beach_owner')->name('beach_owner.dashboard');

// });


// Route::get('/beaches', [BeachController::class, 'index'])->name('beaches.index');
// Route::post('/beaches', [BeachController::class, 'store'])->name('beaches.store');
// Route::get('/beaches/{id}/image', [BeachController::class, 'showImage'])->name('beaches.image');


// Route::get('/explore', [ExploreController::class, 'index'])->name('explore');


// Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


// Route::get('/register', function () {
//     return view('auth.register-tourist');
// })->name('register');

// Route::post('/register', [RegisteredUserController::class, 'storeTourist'])
//     ->middleware('guest')
//     ->name('register.submit');


// Route::get('/register/owner', function () {
//     return view('auth.register-owner');
// })->middleware('guest')->name('register.owner');

// Route::post('/register/owner', [RegisteredUserController::class, 'storeOwner'])
//     ->middleware('guest')
//     ->name('register.owner.submit');


// Route::get('/api/weather', function () {
//     $lat = request('lat', '13.5812');
//     $lon = request('lon', '124.2372');
//     $apiKey = env('OPENWEATHER_API_KEY');

//     $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
//         'lat' => $lat,
//         'lon' => $lon,
//         'appid' => $apiKey,
//         'units' => 'metric',
//     ]);

//     return $response->json();
// });


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/process', [ChatbotController::class, 'process'])->name('chatbot.process');



// Route::prefix('owner')->middleware(['auth', 'role:beach_owner'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('beach_owner.dashboard');
//     })->name('beach_owner.dashboard');

  
//     Route::get('/manage/beaches', [BeachController::class, 'index'])->name('beach_owner.manage.beaches');
// });



// require __DIR__.'/auth.php';


// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Http;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\ExploreController;
// use App\Http\Controllers\BeachController;
// use App\Http\Controllers\ChatbotController;
// use App\Http\Controllers\InquiryController;
// use App\Http\Controllers\OwnerDashboardController;
// use App\Http\Controllers\OwnerBeachController;

// Route::middleware(['auth'])->group(function () {
   
//     Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])
//         ->name('owner.dashboard');

    
//     Route::get('/owner/beaches', [OwnerBeachController::class, 'index'])
//         ->name('owner.beaches');
//     Route::get('/owner/beaches/create', [OwnerBeachController::class, 'create'])
//         ->name('owner.beaches.create');
//     Route::post('/owner/beaches', [OwnerBeachController::class, 'store'])
//         ->name('owner.beaches.store');
// });



// Route::get('/', function () {
//     return view('home');  
// })->name('home');

// Route::get('/beaches', [BeachController::class, 'index'])->name('beaches.index');
// Route::post('/beaches', [BeachController::class, 'store'])->name('beaches.store');
// Route::get('/beaches/{id}/image', [BeachController::class, 'showImage'])->name('beaches.image');

// Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
// Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


// Route::get('/register', function () {
//     return view('auth.register-tourist');
// })->name('register');

// Route::post('/register', [RegisteredUserController::class, 'storeTourist'])
//     ->middleware('guest')
//     ->name('register.submit');


// Route::get('/register/owner', function () {
//     return view('auth.register-owner');
// })->middleware('guest')->name('register.owner');

// Route::post('/register/owner', [RegisteredUserController::class, 'storeOwner'])
//     ->middleware('guest')
//     ->name('register.owner.submit');


// Route::get('/api/weather', function () {
//     $lat = request('lat', '13.5812');
//     $lon = request('lon', '124.2372');
//     $apiKey = env('OPENWEATHER_API_KEY');

//     $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
//         'lat' => $lat,
//         'lon' => $lon,
//         'appid' => $apiKey,
//         'units' => 'metric',
//     ]);

//     return $response->json();
// });


// Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/process', [ChatbotController::class, 'process'])->name('chatbot.process');


// Route::middleware('auth')->group(function () {
   
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
//     Route::post('/beaches/{beach}/inquiries', [InquiryController::class, 'store'])
//         ->name('inquiries.store');

    
//     Route::get('/owner/inquiries', [InquiryController::class, 'index'])
//         ->name('owner.inquiries');
// });


// Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');  
//     })->name('admin.dashboard');
// });


// Route::middleware(['auth', 'verified', 'role:beach_owner'])->prefix('owner')->group(function () {
   
//     Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
//         ->name('beach_owner.dashboard');

//     Route::get('/manage/beaches', [BeachController::class, 'index'])
//         ->name('beach_owner.manage.beaches');
// });


// require __DIR__.'/auth.php';
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Http;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\ExploreController;
// use App\Http\Controllers\BeachController;
// use App\Http\Controllers\ChatbotController;
// use App\Http\Controllers\InquiryController;
// use App\Http\Controllers\OwnerDashboardController;
// use App\Http\Controllers\OwnerBeachController;


// Route::get('/', function () {
//     return view('home');   
// })->name('home');

// Route::get('/beaches', [BeachController::class, 'index'])->name('beaches.index');
// Route::post('/beaches', [BeachController::class, 'store'])->name('beaches.store');
// Route::get('/beaches/{id}/image', [BeachController::class, 'showImage'])->name('beaches.image');

// Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
// Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


// Route::get('/register', function () {
//     return view('auth.register-tourist');
// })->name('register');

// Route::post('/register', [RegisteredUserController::class, 'storeTourist'])
//     ->middleware('guest')
//     ->name('register.submit');


// Route::get('/register/owner', function () {
//     return view('auth.register-owner');
// })->middleware('guest')->name('register.owner');

// Route::post('/register/owner', [RegisteredUserController::class, 'storeOwner'])
//     ->middleware('guest')
//     ->name('register.owner.submit');


// Route::get('/api/weather', function () {
//     $lat = request('lat', '13.5812');
//     $lon = request('lon', '124.2372');
//     $apiKey = env('OPENWEATHER_API_KEY');

//     $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
//         'lat' => $lat,
//         'lon' => $lon,
//         'appid' => $apiKey,
//         'units' => 'metric',
//     ]);

//     return $response->json();
// });


// Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/process', [ChatbotController::class, 'process'])->name('chatbot.process');


// Route::middleware('auth')->group(function () {
   
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//     Route::post('/beaches/{beach}/inquiries', [InquiryController::class, 'store'])
//         ->name('inquiries.store');

  
//     Route::get('/owner/inquiries', [InquiryController::class, 'index'])
//         ->name('owner.inquiries');
// });


// Route::middleware(['auth', 'verified', 'role:admin'])
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function () {
//         Route::get('/dashboard', function () {
//             return view('admin.dashboard');   
//         })->name('dashboard');
//     });


// Route::middleware(['auth', 'verified', 'role:beach_owner'])
//     ->prefix('owner')
//     ->name('owner.')
//     ->group(function () {
       
//         Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
//             ->name('dashboard');

      
//         Route::resource('beaches', OwnerBeachController::class);

        
//         Route::get('/inquiries', [InquiryController::class, 'index'])
//             ->name('inquiries.index');
//     });


// require __DIR__.'/auth.php';



// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Http;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\ExploreController;
// use App\Http\Controllers\BeachController;
// use App\Http\Controllers\BeachOwnerController;
// use App\Http\Controllers\ChatbotController;
// use App\Http\Controllers\InquiryController;
// use App\Http\Controllers\OwnerDashboardController;
// use App\Http\Controllers\Owner\AmenityController;
// use App\Http\Controllers\WeatherController;




// Route::get('/', function () {
//     return view('home');   
// })->name('home');
// Route::get('/about', function () {
//     return view('about');
// })->name('about');
// Route::get('/weather', function () {
//     return view('weather');
// })->name('weather');

// Route::get('/beaches', [BeachController::class, 'index'])->name('beaches.index');
// Route::get('/beaches/{id}/image', [BeachController::class, 'showImage'])->name('beaches.image');
// Route::get('/beaches/{beach}', [BeachController::class, 'show'])->name('beaches.show');



// Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
// Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


// Route::get('/register', fn () => view('auth.register-tourist'))->name('register');
// Route::post('/register', [RegisteredUserController::class, 'storeTourist'])
//     ->middleware('guest')
//     ->name('register.submit');


// Route::get('/register/owner', fn () => view('auth.register-owner'))
//     ->middleware('guest')
//     ->name('register.owner');
// Route::post('/register/owner', [RegisteredUserController::class, 'storeOwner'])
//     ->middleware('guest')
//     ->name('register.owner.submit');


// Route::get('/api/weather', function () {
//     $lat = request('lat', '13.5812');
//     $lon = request('lon', '124.2372');
//     $apiKey = env('OPENWEATHER_API_KEY');

//     $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
//         'lat' => $lat,
//         'lon' => $lon,
//         'appid' => $apiKey,
//         'units' => 'metric',
//     ]);

//     return $response->json();
// })->name('weather.api');


// Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
// Route::post('/chatbot/process', [ChatbotController::class, 'process'])->name('chatbot.process');

// Route::middleware('auth')->group(function () {
   
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::post('/beaches/{beach}/inquiries', [InquiryController::class, 'store'])
//         ->name('inquiries.store');

    
//     Route::get('/owner/inquiries', [InquiryController::class, 'index'])
//         ->name('owner.inquiries');
// });

// use App\Http\Controllers\Admin\BeachController as AdminBeachController;

// Route::middleware(['auth', 'role:admin'])
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function () {
//         Route::get('/dashboard', [App\Http\Controllers\Admin\BeachController::class, 'dashboard'])
//             ->name('dashboard');
//         Route::resource('beaches', App\Http\Controllers\Admin\BeachController::class)
//             ->only(['index', 'show']);
//         Route::patch('beaches/{beach}/approve', [App\Http\Controllers\Admin\BeachController::class, 'approve'])
//             ->name('beaches.approve');
//         Route::patch('beaches/{beach}/deny', [App\Http\Controllers\Admin\BeachController::class, 'deny'])
//             ->name('beaches.deny');
//     });






// Route::middleware(['auth', 'role:beach_owner'])
//     ->prefix('owner')
//     ->name('owner.')
//     ->group(function () {
     
//         Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
//             ->name('dashboard');

//         Route::post('beaches/{beach}/amenities', [AmenityController::class, 'store'])
//             ->name('amenities.store');
//         Route::delete('beaches/{beach}/amenities/{amenity}', [AmenityController::class, 'destroy'])
//             ->name('amenities.destroy');

        
//         Route::resource('beaches', BeachController::class);

 
//         Route::get('/inquiries', [InquiryController::class, 'index'])
//             ->name('inquiries.index');
//     });



// require __DIR__.'/auth.php';


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\BeachController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\Owner\AmenityController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\Admin\BeachController as AdminBeachController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/search/results', [SearchController::class, 'search'])->name('search.results');



use App\Http\Controllers\ReviewController;

Route::post('/beaches/{beach}/reviews', [ReviewController::class, 'store'])->name('beaches.reviews.store');

// Route::get('/beaches/{id}', [BeachController::class, 'show'])->name('beaches.show');



Route::post('/owner/beaches/{beach}/update-all', [App\Http\Controllers\BeachController::class, 'updateAll'])
    ->name('owner.beaches.updateAll');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/owner/reviews', [App\Http\Controllers\Owner\ReviewController::class, 'index'])
    ->name('owner.reviews.index')
    ->middleware('auth');

use App\Http\Controllers\Owner\ContactController;


Route::middleware(['auth'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        Route::resource('beaches', BeachController::class);

        Route::resource('beaches.contacts', ContactController::class)
            ->shallow()
            ->except(['show']);
    });


// --------------------
// Public Routes
// --------------------
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/weather', [WeatherController::class, 'weather'])->name('weather');

Route::get('/about', [PageController::class, 'about'])->name('about');

// Beaches (Tourist-facing)
Route::get('/beaches', [BeachController::class, 'index'])->name('beaches.index');
Route::get('/beaches/{id}/image', [BeachController::class, 'showImage'])->name('beaches.image');
Route::get('/beaches/{beach}', [BeachController::class, 'show'])->name('beaches.show');

// Explore + Search
Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

// Tourist Registration
Route::get('/register', fn () => view('auth.register-tourist'))->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'storeTourist'])
    ->middleware('guest')
    ->name('register.submit');

// Beach Owner Registration
Route::get('/register/owner', fn () => view('auth.register-owner'))
    ->middleware('guest')
    ->name('register.owner');
Route::post('/register/owner', [RegisteredUserController::class, 'storeOwner'])
    ->middleware('guest')
    ->name('register.owner.submit');

// Weather API
Route::get('/api/weather', function () {
    $lat = request('lat', '13.5812');
    $lon = request('lon', '124.2372');
    $apiKey = env('OPENWEATHER_API_KEY');

    $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
        'lat' => $lat,
        'lon' => $lon,
        'appid' => $apiKey,
        'units' => 'metric',
    ]);

    return $response->json();
})->name('weather.api');

// Chatbot
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/process', [ChatbotController::class, 'process'])->name('chatbot.process');

// --------------------
// Authenticated Routes
// --------------------
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tourist sends inquiry
    Route::post('/beaches/{beach}/inquiries', [InquiryController::class, 'store'])
        ->name('inquiries.store');

    // Owner views inquiries
    Route::get('/owner/inquiries', [InquiryController::class, 'index'])
        ->name('owner.inquiries');
});

// --------------------
// Admin Routes
// --------------------
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminBeachController::class, 'dashboard'])->name('dashboard');
        Route::resource('beaches', AdminBeachController::class)->only(['index', 'show']);
        Route::patch('beaches/{beach}/approve', [AdminBeachController::class, 'approve'])->name('beaches.approve');
        Route::patch('beaches/{beach}/deny', [AdminBeachController::class, 'deny'])->name('beaches.deny');
    });

// --------------------
// Beach Owner Routes
// --------------------
Route::middleware(['auth', 'role:beach_owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');

        // Amenities
        Route::post('beaches/{beach}/amenities', [AmenityController::class, 'store'])->name('amenities.store');
        Route::delete('beaches/{beach}/amenities/{amenity}', [AmenityController::class, 'destroy'])->name('amenities.destroy');

        // Beaches (CRUD)
        Route::resource('beaches', BeachController::class);

        // Inquiries
        Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    });

// --------------------
// Auth routes (Breeze/Fortify)
// --------------------

