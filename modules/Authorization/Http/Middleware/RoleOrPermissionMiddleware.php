<?php

namespace TrekSt\Modules\Authorization\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleOrPermissionMiddleware
{
    public function handle($request, Closure $next, $roleOrPermission)
    {
        if (Auth::guard('backend')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        if(Auth::guard('backend')->user()->super_user){
            return $next($request);
        }

        $rolesOrPermissions = is_array($roleOrPermission)
            ? $roleOrPermission
            : explode('|', $roleOrPermission);

        if (! Auth::guard('backend')->user()->hasAnyRole($rolesOrPermissions) && ! Auth::guard('backend')->user()->hasAnyPermission($rolesOrPermissions)) {
            throw UnauthorizedException::forRolesOrPermissions($rolesOrPermissions);
        }

        return $next($request);
    }
}
