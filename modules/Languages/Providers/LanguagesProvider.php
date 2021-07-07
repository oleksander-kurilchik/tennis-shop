<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 10.07.18
 * Time: 13:03
 */

namespace  TrekSt\Modules\Languages\Providers;

use  TrekSt\Modules\Languages\Services\LanguagesServices;
use  Illuminate\Support\ServiceProvider;
class LanguagesProvider extends  ServiceProvider
{
    protected $defer = true;
    public function register()
    {
        $this->app->singleton('languagesHandler', function($app)
        {
            return new  LanguagesServices();
        });

    }
    public function provides()
    {
        return ['languagesHandler'];
    }

}
