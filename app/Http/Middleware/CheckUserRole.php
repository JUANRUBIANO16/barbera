<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Verificar si el usuario está logueado
        if (!session('user_type')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // Verificar si el tipo de usuario tiene permisos
        $userType = session('user_type');
        
        if (!in_array($userType, $roles)) {
            return redirect()->route('panel')->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
