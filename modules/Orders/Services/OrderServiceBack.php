<?php


namespace TrekSt\Modules\Orders\Services;


use Spatie\SchemaOrg\Thing;
use TrekSt\Modules\Orders\Models\OrdersPrice;

class OrderServiceBack
{
    public function __construct($order,$orderPriceModel)
    {
        $this->order = $order;
        $this->orderPriceModel = $orderPriceModel;

    }

    public function refreshOrderPrice(){

        $total_count = 0;
        $orderProducts = $this->order ->products;
        $orderProducts->load('prices');
        $orderPrices = [];
        foreach ($this->order->prices as $item) {
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
                    $orderPrice->orders_id = $this->order->id;
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
        $this->order->total_count = $total_count;
        $this->order->save();

    }

}
