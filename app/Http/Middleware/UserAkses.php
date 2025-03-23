<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserAkses
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Silakan login terlebih dahulu');
        }

        $userRole = Auth::user()->role;

        // Jika role user tidak cocok dengan yang diizinkan
        if ($userRole !== $role) {
            return response()->view('restricted', [], 403);
        }

        return $next($request);
    }
}
