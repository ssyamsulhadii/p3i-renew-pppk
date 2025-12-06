<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfUnauthorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        if ((Auth::user()->level === 'admin' && $role ===  'admin')) {
            return $next($request);
        }
        if ((Auth::user()->level === 'member' && $role ===  'member')) {
            return $next($request);
        }
        return abort(403);
    }
}
