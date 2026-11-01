<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
    {
       
        if (!$request->session()->has('is_admin')) {
            // Kalau TIDAK ADA, usir ke halaman login
            return redirect('/login-admin')->with('error', 'Eits, masukin password dulu ya!');
        }

      
        return $next($request);
    }
}
