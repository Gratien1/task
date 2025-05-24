<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Vérifie si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Vérifie si l'utilisateur a au moins un des rôles requis
        if (!$user->hasAnyRole($roles)) {
            abort(403, 'Accès refusé. Rôle insuffisant.');
        }

        return $next($request);
    }
}
