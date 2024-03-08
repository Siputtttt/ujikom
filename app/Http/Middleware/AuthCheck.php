<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        if (!Auth::user()) {
            Auth::logout();
            return redirect('/login')->with('error', 'Pengguna tidak ditemukan. Silakan login kembali.');
        }

        return $next($request);
    }
}
