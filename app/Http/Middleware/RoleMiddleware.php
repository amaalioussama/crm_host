<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('login');
        }

        // Check if the user's role matches
        if (Auth::user()->role != $role) {
            abort(403, 'Unauthorized'); // Forbidden if role doesn't match
        }

        return $next($request);
    }
}

