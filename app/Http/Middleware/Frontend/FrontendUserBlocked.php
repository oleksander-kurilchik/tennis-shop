<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Illuminate\Support\Facades\Redirect;

class FrontendUserBlocked
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
        if ( $request->user('frontend')->isBlocked()  ) {
         return    Redirect::route(  'frontend.account.blocked.blocked');
        }
        return $next($request);
    }
}
