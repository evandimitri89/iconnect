<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // misal OSIS = role_id 2
        $userRole = Auth::user()->role_id;

        if (!in_array($userRole, $roles)) {
            abort(403); // forbidden
        }

        return $next($request);
    }
}
