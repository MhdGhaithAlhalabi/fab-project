<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class UpgradeToHttpsUnderNgrok
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if (str_ends_with($request->getHost(), '.ngrok-free.app')) {
            //env('APP_DEBUG',false);
            Config::set('app.debug' ,false);
            URL::forceScheme('https');
        }

        return $next($request);
    }
}
