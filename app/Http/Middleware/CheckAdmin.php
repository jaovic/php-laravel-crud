<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            abort(403, 'Acesso negado.');
        }

        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Acesso negado. Apenas administradores.');
        }

        return $next($request);
    }
}
