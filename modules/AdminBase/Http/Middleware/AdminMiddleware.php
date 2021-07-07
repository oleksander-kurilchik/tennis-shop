<?php

namespace TrekSt\Modules\AdminBase\Middleware;

use Closure;
use Auth;
use Breadcrumbs;

//use Illuminate\Support\Facades\Gate;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'backend')
    {
        $this->registerAdminBreadcumps();
        $this->defineSuperAdmin();

        return $next($request);
    }

    protected function registerAdminBreadcumps()
    {

        app()->setLocale('uk');
        config('breadcrumbs.invalid-named-breadcrumb-exception', false);
        config('breadcrumbs.missing-route-bound-breadcrumb-exception', false);

        $this->breadcrumbsFor('admin.index', function ($breadcrumbs) {
            $breadcrumbs->push(trans('admin_breadcrumbs.index'), route('admin.index'));
        });

        include(base_path('modules/admin_breadcrumbs.php'));

    }

    protected function breadcrumbsFor($name, $callback)
    {
        Breadcrumbs::for($name, $callback);
    }

    protected function defineSuperAdmin()
    {

        \Config::set('auth.defaults.guard', 'backend');
        \Gate::before(function ($user, $ability) {
            $backendUser = \Auth::guard('backend')->user();
            if ($user && $user->super_user == true) {
                return true;
            }
        });
    }


}
