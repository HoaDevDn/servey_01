<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use Config;

class SetLang
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
        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if (!in_array($locale, config('settings.locale'))) {
                $locale = config('settings.locale.en');
            }
        }

        App::setLocale($locale);

        return $next($request);
    }
}
