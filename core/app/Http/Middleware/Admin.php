<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use Closure;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Session::get('adm'));
        if(Session::has('adm'))
        {
            return $next($request);
        }
        else
        {     
            Session::flush();
            auth()->logout();
            return redirect('/login');
        }

        // return $next($request);
    }
}
