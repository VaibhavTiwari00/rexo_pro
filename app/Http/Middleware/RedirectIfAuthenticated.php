<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Redirect to a custom route if the user is authenticated
            return redirect('/login');
        }
        return $next($request);
    }
}
