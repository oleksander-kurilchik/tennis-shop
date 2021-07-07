<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 11.08.18
 * Time: 17:34
 */

namespace TrekSt\Modules\Wishlist\Services;

use  TrekSt\Modules\Currencies\Models\Currency as CurrencyModel;
use Session;
use Cache;
use Auth;
use TrekSt\Modules\Wishlist\Repository\Frontend\WishlistRepository;

class WishlistServices
{
    protected $count = 0;
    protected $itemsList ;
    protected  $repository ;
    public function __construct()
    {
        $user = Auth::guard('frontend')->user();
        if(!$user){
           $this->itemsList = collect();
           return;
        }
        $this->repository = new WishlistRepository();
        $this->count = $this->repository->getCount($user->id);
        $this->itemsList = $this->repository->getItems($user->id)->pluck('products_id');
        $debug = 0;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function isExists($id)
    {
         return $this->itemsList->search($id)?true:false;
    }




}
