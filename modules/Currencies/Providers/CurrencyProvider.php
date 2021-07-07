<?php

namespace TrekSt\Modules\Currencies\Providers;

use  Illuminate\Support\ServiceProvider;
use TrekSt\Modules\Currencies\Services\CurrencyServices;

class CurrencyProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('currencyHandler', function ($app) {
            return new  CurrencyServices();
        });
    }

    public function provides()
    {
        return ['currencyHandler'];
    }

}
