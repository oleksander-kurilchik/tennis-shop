<?php

namespace App\Http;

 use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'frontend' => [
            \App\Http\Middleware\Frontend\FrontendViewsDataMiddleware::class,
            \App\Http\Middleware\Frontend\FrontendSettingsMiddleware::class,

        ],
        'frontend_profile' => [
//            \App\Http\Middleware\Authenticate::class,
//            \App\Http\Middleware\Frontend\FrontendUserInactive::class,
//            \App\Http\Middleware\Frontend\FrontendUserBlocked::class,
            \App\Http\Middleware\Frontend\FrontendProfileViewsDataMiddleware::class
        ],


        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'verified_frontend' => \App\Http\Middleware\Frontend\FrontendEnsureEmailIsVerified::class,
        'auth_backend' => \TrekSt\Modules\BackendAuth\Middleware\IsBakendLogined::class,
        'admin_middleware' => \TrekSt\Modules\AdminBase\Middleware\AdminMiddleware::class,
        //'is_admin' => \TrekSt\Modules\BackendAuth\Middleware\IsAdministratorMiddleware::class,
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
        'jsonify'    => \App\Http\Middleware\Jsonify::class,


        'frontend-views-data'    => \App\Http\Middleware\Frontend\FrontendViewsDataMiddleware::class,
        'frontend-settings'    => \App\Http\Middleware\Frontend\FrontendSettingsMiddleware::class,
        'frontend-profile-views-data'    => \App\Http\Middleware\Frontend\FrontendViewsDataMiddleware::class,
        'frontend-is-inactive'    => \App\Http\Middleware\Frontend\FrontendUserInactive::class,
        'frontend-is-blocked'    => \App\Http\Middleware\Frontend\FrontendUserBlocked::class,
        'frontend-phone-empty'    => \App\Http\Middleware\Frontend\FrontendUserPhoneEmpty::class,
        'auth_frontend' => \App\Http\Middleware\Frontend\RedirectIfFrontendAuthenticated::class,

        'role' => \TrekSt\Modules\Authorization\Http\Middleware\RoleMiddleware::class,
        'permission' => \TrekSt\Modules\Authorization\Http\Middleware\PermissionMiddleware::class,
        'role_or_permission' => \TrekSt\Modules\Authorization\Http\Middleware\RoleOrPermissionMiddleware::class,
    ];
}
