<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class FrontendUserPhoneEmpty
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
        if ( \Auth::guard('frontend')->check() && \Auth::guard('frontend')->user()->phone == null  ) {
            $message = [
                'title'=>trans('message.empty_phone.title'),
                'description'=>trans('message.empty_phone.description'),
            ];
            return new Response(view('frontend.message.show',['message'=>$message]));
        }
        return $next($request);
    }
}
