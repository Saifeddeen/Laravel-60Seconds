<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $default = session('lang',config('app.locale'));
        $lang = request('lang', $default);
        session()->put('lang', $lang);
        App::setLocale($lang);
        return $next($request);
    }
}
