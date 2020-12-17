<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class hasAccessToAdminPanel
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
        if (Auth::user()->hasAccessToAdminPanel()) {
          return $next($request);
        }
        if ($request->ajax()) {
          return response('Unauthorized.', 401);
        } else {
          return abort(401);
        }
    }
}
