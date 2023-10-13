<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleCookieMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->cookie('locale', app()->getLocale());
        app()->setlocale($locale);
        return $next($request);
    }
}
