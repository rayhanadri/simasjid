<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $role = array("1", "2", "3", "4"); 
        if (in_array("100", $role)) {
            return $next($request);
        } else {
            return redirect('/');
        }
        return $next($request);
    }
}
