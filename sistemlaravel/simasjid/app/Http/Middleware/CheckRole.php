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
    use Auth;

    public function handle($request, Closure $next, $roles)
    {
        $anggota = Auth::user();

        if ($anggota->id_jabatan == 1) {
            return $next($request);
        }

        foreach ($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if ($anggota->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect(route('home'));
    }
}
