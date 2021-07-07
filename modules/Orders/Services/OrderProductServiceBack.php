<?php


namespace TrekSt\Modules\Orders\Services;


use TrekSt\Modules\Orders\Models\OrdersPrice;
use TrekSt\Modules\Products\Models\Common\Currency;

class OrderProductServiceBack
{

    public function __construct($orderProduct, $currencyModel,$productPriceModel)
    {
        $this->orderProduct = $orderProduct;
        $this->currencyModel = $currencyModel;
        $this->productPriceModel = $productPriceModel;

    }

    public function rebuilPrice(){
        $product = $this->orderProduct->product;
        $prices = $product->getAllCurrencyPrices();


        $arrPrices = [];
        foreach ($this->orderProduct->prices as $item) {
            $arrPrices[$item->currency_id] = $item;
        }
        $currencies = $this->currencyModel->get();
        foreach ($currencies as $currency) {

            $price = $prices->firstWhere("currency_id", $currency->id);
            if ($price == null) {
                continue;
            }
            if (isset($arrPrices[$currency->id])) {
                $orderProductPrice = $arrPrices[$currency->id];
                $orderProductPrice->price = $price["price"];
                $orderProductPrice->total_price = $this->orderProduct->quantity * $orderProductPrice->price;
                $orderProductPrice->save();
            } else {
                $orderProductPrice =$this->productPriceModel->newInstance();
                $orderProductPrice->orders_products_id = $this->orderProduct->id;
                $orderProductPrice->currency_id = $currency->id;
                $orderProductPrice->price = $price["price"];
                $orderProductPrice->total_price = $this->orderProduct->quantity * $orderProductPrice->price;
                $orderProductPrice->save();
            }
        }
    }


}
