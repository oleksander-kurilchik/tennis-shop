<?php

namespace TrekSt\Modules\Authorization\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guard('backend')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        $uuu = Auth::guard('backend')->user();
        if(Auth::guard('backend')->user()->super_user){
            return $next($request);
        }


        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (! Auth::guard('backend')->user()->hasAnyRole($roles)) {
            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);
    }
}
