<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            session(['role' => auth()->user()->role]);
        }

        return $next($request);
    }
}
