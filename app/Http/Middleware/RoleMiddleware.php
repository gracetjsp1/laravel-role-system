<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // 👈 ADD THIS

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check role from roles relationship
        if (!Auth::user()->roles->contains('name', $role)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
