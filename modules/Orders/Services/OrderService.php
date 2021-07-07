<?php


namespace TrekSt\Modules\Orders\Services;


use TrekSt\Modules\Orders\Models\Order;
use TrekSt\Modules\Orders\Models\OrdersPrice;
use TrekSt\Modules\Orders\Models\OrdersProduct;
use TrekSt\Modules\Orders\Models\OrdersProductsPrice;
use TrekSt\Modules\Products\Models\Product;

class OrderService
{
    public function __construct($cartService)
    {
        $this->cartService = $cartService;
        $this->orderModel = new Order();
        $this->orderPriceModel = new OrdersPrice();
        $this->productModel = new Product();
        $this->ordersProductModel = new OrdersProduct();
        $this->OrdersProductsPrice = new OrdersProductsPrice();
        $this->orderProductService =  new   OrderProductService();

    }



    public function createOrderFromCart($orderData = []){
        $order = $this->orderModel->newInstance($orderData);
        if (\Auth::guard('frontend')->check())
        {
            $this->fillOrderFromUser($order,\Auth::guard('frontend')->user());
        }
        $this->fillOrderData($order);
        $order->save();

        $cart_content = $this->cartService->getContent();

        $products_ids = $cart_content->pluck('id');
        $products = $this->productModel->newQuery()->published()->whereIn('id', $products_ids)->get();
        $products->load(['trans', 'logo']);
        foreach ($cart_content as $cartItem) {
            $product = $products->where('id', $cartItem->id)->first();
            if ($product != null) {
                $orderProduct = $this->ordersProductModel->newInstance();
                $orderProduct->products_id = $product->id;
                $orderProduct->product_name = $product->trans->title;
                $orderProduct->vendor_code = $product->vendor_code;
                $orderProduct->quantity = $cartItem->qty;
                $orderProduct->orders_id = $order->id;
                $orderProduct->save();
                $this->orderProductService->rebuilPrice($orderProduct);;
            }
        }

        $this->refreshOrderPrice($order);
        return $order;

    }



    public function fillOrderFromUser($order ,$user){
        $order->first_name = $user->first_name;
        $order->last_name = $user->last_name;
        $order->email = $user->email;
        $order->phone = $user->phone;
        $order->users_id = $user->id;

    }
    public function fillOrderData($order){
        $order->ip = request()->ip();
        $order->user_agent = request()->userAgent();
        $order->date_order =   \Carbon\Carbon::now();
        $order->total_count = $this->cartService->getCount() ;
        $order->currency_id = \CurrencyHandler::current()->id;


    }


    public function refreshOrderPriceById($orders_id)
    {
        $order  = $this->orderModel->newQuery()->where('id',$orders_id)->firstOrFail();
        $this->refreshOrderPrice($order);

    }





    public function refreshOrderPrice($order){

        $total_count = 0;
        $orderProducts = $order ->products;
        $orderProducts->load('prices');
        $orderPrices = [];
        foreach ($order->prices as $item) {
            $orderPrices[$item->currency_id] = $item;
            $item->price = 0;
        }

        foreach ($orderProducts as $product) {
            $total_count += $product->quantity;
            foreach ($product->prices as $price) {
                if (isset($orderPrices[$price->currency_id])) {
                    $orderPrices[$price->currency_id]->price += $price->total_price;
                } else {
                    $orderPrice =$this->orderPriceModel->newInstance();
                    $orderPrice->orders_id = $order->id;
                    $orderPrice->currency_id = $price->currency_id;
                    $orderPrice->price = $price->total_price;
                    $orderPrices[$price->currency_id] = $orderPrice;
                }
            }
        }


//        foreach ($this->services as $service) {
//
//            foreach ($service->prices as $price) {
//                if (isset($orderPrices[$price->currency_id])) {
//                    $orderPrices[$price->currency_id]->price += $price->price;
//                } else {
//                    $orderPrice = new OrdersPrice();
//                    $orderPrice->orders_id = $this->id;
//                    $orderPrice->currency_id = $price->currency_id;
//                    $orderPrice->price = $price->price;
//                    $orderPrices[$price->currency_id] = $orderPrice;
//                }
//            }
//        }

        foreach ($orderPrices as &$item) {
            $item->save();
        }
        $order->total_count = $total_count;
        $order->save();

    }





}
