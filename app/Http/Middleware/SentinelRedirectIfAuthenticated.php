<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelRedirectIfAuthenticated
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
        $user = Sentinel::check();
        if ($user) {
            if ($user->inRole(1)) {
                return redirect('/news');
            }
        }
        return $next($request);
    }
}
