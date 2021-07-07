<?php


namespace TrekSt\Modules\Languages\Facades;


use Illuminate\Support\Facades\Facade;
class FLangFacade extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return "languagesHandler";
    }

}
