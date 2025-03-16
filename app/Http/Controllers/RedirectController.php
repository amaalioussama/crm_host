<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function redirect()
    {
        // Get the redirection path from the session
        $redirectTo = session('redirect_to', '/');  // Default to home if no session path exists
        
        // Clear the session after redirecting to avoid multiple redirects
        session()->forget('redirect_to');

        // Perform the redirection
        return Redirect::to($redirectTo);
    }
}

