<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login form.
     */
    public function create()
    {
        // Return your custom Blade login view
        return view('auth.custom-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
{
    // Validate login input
    $credentials = $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    // Attempt login
    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Role-based redirect
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'beach_owner') {
            return redirect()->route('owner.dashboard');
        } elseif ($user->role === 'tourist') {
            return redirect()->route('home');
        }

        // Default fallback
        return redirect('/');
    }

    // If login fails
    return back()
        ->withErrors(['email' => 'Invalid email or password.'])
        ->withInput();
}


    /**
     * Log the user out.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect back to login page
        return redirect()->route('login');
    }
    protected function authenticated(Request $request, $user)
{
    return redirect()->route('owner.beaches.index');
}

}
