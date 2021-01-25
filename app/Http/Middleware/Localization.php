<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $base = env('APP_LOCALE_BASE', 'ru');
        $lang = $request->route()->parameter('locale');

        App::setLocale($lang ? $lang : $base);

        if ($base === $lang) {
            $query    = $request->get('query');
            $segments = $request->segments();

            array_shift($segments);

            $path = implode('/', $segments);

            if ($query) {
                $path .= '?query='. $query;
            }
            return redirect($path);
        }else{
            return $next($request->merge([
                'locale' => App::getLocale()
            ]));
        }
    }
}
