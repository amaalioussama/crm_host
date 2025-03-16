<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class CustomAuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'nullable|email', // Admin login will use email
            'surname' => 'required_without:email', // Surname is required for normal users
            'password' => 'required|string', // Password is always required
        ]);

        // If email is provided (admin login)
        if ($request->email) {
            if ($request->email === 'admin@admin.admin' && $request->password === 'adminadmin') {
                $user = User::where('email', 'admin@admin.admin')->first(); // Find the admin
                Auth::login($user);
                return redirect()->route('dashboard'); // Redirect to admin dashboard
            } else {
                return redirect()->route('login')->withErrors(['email' => 'Invalid email or password.']);
            }
        }

        // If surname is provided (normal user login)
        if ($request->surname) {
            $user = User::where('surname', $request->surname)->first(); // Find user by surname

            // Check if user exists and password is correct
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('dashboard'); // Redirect to user dashboard
            } else {
                return redirect()->route('login')->withErrors(['surname' => 'Invalid surname or password.']);
            }
        }

        // If neither email nor surname is provided
        return back()->withErrors(['error' => 'Invalid login attempt.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

