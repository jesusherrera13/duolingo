<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageSelection
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
        if(!$request->session()->has('language_id')) {

            $request->session()->put('language_id', 1);
            $request->session()->put('language_code', 'zh');
        }

        $request->session()->put('languages', Language::orderBy('name')->get());

        return $next($request);
    }
}
