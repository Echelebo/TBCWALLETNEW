<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Closure;
use Session;
use GuzzleHttp\Client as GuzzleClient;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next){
        return $next($request);
    }

}
