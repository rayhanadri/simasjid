<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckKetua
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
        if (Auth::user()->id_jabatan == 1) {
            return $next($request);
        } else {
            return redirect(route('home'));
        }
    }
}
