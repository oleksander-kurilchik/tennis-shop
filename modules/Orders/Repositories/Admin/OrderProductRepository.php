<?php


namespace TrekSt\Modules\Orders\Repositories;


 use TrekSt\Modules\Orders\Models\OrdersProduct;
use TrekSt\Modules\Orders\Models\OrdersProductsPrice;
 use TrekSt\Modules\Products\Models\Product;

 class OrderProductRepository
{

    public function __construct()
    {
        $this->orderProductModel = new OrdersProduct();
        $this->orderProductPriceModel = new OrdersProductsPrice();
        $this->productModel = new Product();

    }
    public function addProduct($products_id, $orders_id,$qty = 1){


        $product = $this->productModel->where('id',$products_id)->first();
        $orderProduct = $this->orderProductModel->newInstance();
        $orderProduct->orders_id = $orders_id;
        $orderProduct->products_id = $product->id;
        $orderProduct->product_name = $product->name;
        $orderProduct->vendor_code = $product->vendor_code;
        $orderProduct->quantity = $qty;
        $orderProduct->save();
        return $orderProduct;

    }



}
