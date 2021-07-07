<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 10.07.18
 * Time: 13:08
 */

namespace TrekSt\Modules\Currencies\Facades;

use Illuminate\Support\Facades\Facade;
class CurrencyFacade extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return "currencyHandler";
    }

}
