<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 11.08.18
 * Time: 17:34
 */

namespace TrekSt\Modules\LastViewed\Services;

use Session;
use Cache;
use Auth;
use Cart;
use Gloudemans\Shoppingcart\CartItem;
use TrekSt\Modules\Products\Repositories\Frontend\ProductsRepository;

class LastViewedProductsServices
{
    /**
     * @var    $lastViewedProductInstance \Gloudemans\Shoppingcart\Cart
     */
    protected $lastViewedProductInstance;
    protected $productRepository;

    public function __construct()
    {
        /**
         * @var    $this->lastViewedProductInstance \Gloudemans\Shoppingcart\Cart
         */
        $this->lastViewedProductInstance = Cart::instance('lastViewedProductInstance');
        $this->productRepository = new ProductsRepository();

    }

    public function addProduct($product){
        $this->lastViewedProductInstance->add($product->id,$product->name,1,0);
    }

    public function getAllProducts(){
        $this->lastViewedProductInstance->content();

    }

    public function getProducts(){
        $products = [];
        $content = $this->lastViewedProductInstance->content();
        $productsIds = $content->sortBy(function ($item, $key) {
            return -$item->qty;
        })->transform(function ($item){
            return $item->id;
        })->values();

        $products = $this->productRepository->getProducts($productsIds);
        return $products;
      return  $this->productRepository->getProducts($productsIds);
    }







}
