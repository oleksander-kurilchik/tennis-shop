<?php


namespace TrekSt\Modules\Wishlist\Repository\Admin;


use TrekSt\Modules\Wishlist\Models\Wishlist;

class WishlistRepository
{
    public function __construct()
    {
        $this->baseModels = new Wishlist();
    }


    public function create($data)
    {
        $this->baseModels->newQuery()->firstOrCreate($data);

    }
    public function remoreForUser($userId,$productsId)
    {
        $this->baseModels->newQuery()-> where(['products_id'=>$productsId,'users_id'=>$userId])->delete();
    }

    public function getCount($userId){
        return \DB::table('products')->where(['products.published' => true])->whereIn('products.id',
            function ($query) use ($userId) {
                $query->select('products_id')->from('wishlist')->where(['users_id' => $userId]);
            })->count();
    }



}
