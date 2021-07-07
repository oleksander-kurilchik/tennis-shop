<?php


namespace TrekSt\Modules\Wishlist\Repository\Frontend;


use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Wishlist\Models\Wishlist;

class WishlistRepository
{
    public function __construct()
    {
        $this->baseModels = new Wishlist();
    }


    public function getCount($userId)
    {
        return Product::query()->published()->whereIn('products.id',
            function ($query) use ($userId) {
                $query->select('products_id')->from('wishlist')->where(['users_id' => $userId]);
            })->count();
    }
    public function getItems($userId){
        return \DB::table('wishlist')->select('products_id')->where(['users_id' => $userId])->get();
    }


}
