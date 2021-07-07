<?php

namespace TrekSt\Modules\BackendAuth\Middleware;

use Closure;
use Auth;

class IsBakendLogined
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
  public function handle($request, Closure $next,$guard = 'backend')
  {
    if (!Auth::guard("backend")->check()) {
      return redirect(route("admin.auth.show"));
    }
      \Config::set('auth.defaults.guard', 'backend');
    return $next($request);
  }
}
