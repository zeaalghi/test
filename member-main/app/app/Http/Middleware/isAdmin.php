<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status == 1) {
            return $next($request);
        }

        Auth::logout();
        session()->flush();
        return redirect()->route('loginDriver')->with('error', 'Silahkan Login Terlebih Dahulu');
        // abort(403, 'Unauthorized');
    }
}
