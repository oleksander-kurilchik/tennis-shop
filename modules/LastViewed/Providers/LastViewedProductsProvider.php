<?php

namespace TrekSt\Modules\LastViewed\Providers;

use  Illuminate\Support\ServiceProvider;
use TrekSt\Modules\LastViewed\Services\LastViewedProductsServices;

class LastViewedProductsProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('lastViewedProduct', function ($app) {
            return new  LastViewedProductsServices();
        });
    }

    public function provides()
    {
        return ['lastViewedProduct'];
    }

}
