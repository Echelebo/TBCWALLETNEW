<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;

class Laravel_core
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     
    public function handle($request, Closure $next)
    {
        $route = Route::getRoutes()->match($request);
        if($route->getName() != "homelogin" && $route->getName() != "mail_settings" && $route->getName() != "login_system")
        {
            ErrorHandler(); 
        }
        
        return $next($request);        
    }
}
