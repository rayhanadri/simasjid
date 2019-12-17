<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //LIST OF CONSTANT VALUE FOR MEMBER STATUS
    public const ACTIVE_MEMBER = 1;
    public const NON_ACTIVE_MEMBER = 2;
    public const UNVERIFIED_MEMBER = 3;

    public function handle($request, Closure $next)
    {
        //jika user terotentikasi statusnya aktif bisa lanjutkan, jika tidak return ke '/'
        $authUser = Auth::user();
        if ($authUser->id_status == self::ACTIVE_MEMBER) {
            return $next($request);
        }
        return redirect('/');
    }
}
