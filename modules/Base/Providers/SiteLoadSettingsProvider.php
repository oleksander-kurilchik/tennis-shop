<?php

namespace TrekSt\Modules\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Cache;
use DB;

class SiteLoadSettingsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    /**
     * Load site settings from database
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $file) {
            require_once($file);
        }
    }
}
