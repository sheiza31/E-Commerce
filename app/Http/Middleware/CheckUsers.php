<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        
        if (!Session::has('roles') || Session::get('roles')!= $role) {
            // Jika tidak ada, redirect ke halaman login
            return redirect()->route('home')->with('error', 'Anda Tidak Memiliki Akses');
        }


        return $next($request);
    }
}
