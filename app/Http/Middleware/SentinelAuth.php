<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelAuth
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
        if (Sentinel::guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }
            if ($request->segment(1) == 'admin') {
                return redirect('forbidden');
            }
            return redirect()->route('login')->withNotification(['message'=>'Session telah expaired.', 'form'=>'login']);
        }
        return $next($request);
    }
}
