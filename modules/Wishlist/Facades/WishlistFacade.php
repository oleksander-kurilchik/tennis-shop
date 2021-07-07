<?php

namespace TrekSt\Modules\Wishlist\Facades;

use Illuminate\Support\Facades\Facade;
class WishlistFacade extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return "wishlistHandler";
    }

}
