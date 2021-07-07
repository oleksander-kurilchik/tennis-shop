<?php

namespace TrekSt\Modules\Wishlist\Providers;

use  Illuminate\Support\ServiceProvider;
use TrekSt\Modules\Currencies\Services\CurrencyServices;
use TrekSt\Modules\Wishlist\Services\WishlistServices;

class WishlistProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('wishlistHandler', function ($app) {
            return new  WishlistServices();
        });
    }

    public function provides()
    {
        return ['wishlistHandler'];
    }

}
