<?php

namespace App\Http\Middleware;

use Closure;

class Currency
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
        $base = env('APP_CURRENCY', 'UAH');

        return $next($request->merge([
            'currency' => $request->session()->get('currency', $base)
        ]));
    }
}
