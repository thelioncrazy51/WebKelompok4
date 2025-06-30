<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
    
        if (!session('user')) {
            return redirect('/login');
        }

        return $response->header('X-Frame-Options', 'SAMEORIGIN')
                        ->header('X-Content-Type-Options', 'nosniff')
                        ->header('X-XSS-Protection', '1; mode=block');
    }
}
