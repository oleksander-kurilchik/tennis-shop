<?php

namespace TrekSt\Modules\BackendAuth\Middleware;

use Closure;
use Auth;

class IsAdministratorMiddleware
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

    $user  = Auth::guard('backend')->user();
    if($user->user_type == 'admin' || $user->user_type == 'super_admin'){
        return $next($request);
    }
      return abort(403);


  }
}
