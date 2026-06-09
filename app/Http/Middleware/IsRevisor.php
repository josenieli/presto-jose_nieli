<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor){
        return $next($request);
        }
        return redirect()->route('home')->with('errorMessage', 'Zona riservata ai revisori');
    }
}

class SetLocaleMiddleware{
    public function handle(Request $request, Closure $next): Response{
        $localeLanguage = session('locale', 'it');
        App::setLocale($localeLanguage);
        return $next($request);
    }
}
