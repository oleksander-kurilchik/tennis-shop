<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;

class FrontendUserInactive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if ($request->user('frontend')->isInActive()) {
          return   Redirect::route('frontend.account.blocked.inactive');
        }
        return $next($request);
    }
}
