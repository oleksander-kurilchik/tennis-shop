<?php

namespace TrekSt\Modules\Authorization\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::guard('backend')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        if(Auth::guard('backend')->user()->super_user){
            return $next($request);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (Auth::guard('backend')->user()->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
