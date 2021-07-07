<?php


namespace TrekSt\Modules\Authorization\Providers;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class BackendAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

    }
    public function register()
    {

    }
}
