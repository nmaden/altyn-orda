<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use App\Helper\CurrentLang;
class SetLocale
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

        $langPrefix = ltrim($request->route()->getPrefix(),'/');

        if($langPrefix) {

            App::setLocale($langPrefix);
			CurrentLang::set($langPrefix);

        }else{
          \App::setLocale('ru');
            CurrentLang::set('ru');
		}
		
        return $next($request);
    }
}
