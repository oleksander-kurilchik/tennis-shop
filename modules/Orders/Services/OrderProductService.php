<?php


namespace TrekSt\Modules\Orders\Services;


use Spatie\SchemaOrg\Product;
use TrekSt\Modules\Currencies\Models\Currency;
use TrekSt\Modules\Orders\Models\OrdersPrice;
use TrekSt\Modules\Orders\Models\OrdersProductsPrice;

class OrderProductService
{

    public function __construct( )
    {
        $this->currencyModel = new Currency();
        $this->productPriceModel = new OrdersProductsPrice();

    }

    public function rebuilPrice($orderProduct){
        $product = $orderProduct->product;
        $prices = $this->getAllCurrencyPrices($product);
        $arrPrices = [];
        foreach ($orderProduct->prices as $item) {
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
                $orderProductPrice->total_price = $orderProduct->quantity * $orderProductPrice->price;
                $orderProductPrice->save();
            } else {
                $orderProductPrice =$this->productPriceModel->newInstance();
                $orderProductPrice->orders_products_id = $orderProduct->id;
                $orderProductPrice->currency_id = $currency->id;
                $orderProductPrice->price = $price["price"];
                $orderProductPrice->total_price = $orderProduct->quantity * $orderProductPrice->price;
                $orderProductPrice->save();
            }
        }
    }

//
//    protected function getAllCurrencyPrices(){
//
//    }

    public function getAllCurrencyPrices($product)
    {

        $prices = collect();
        $curencies = \CurrencyHandler::getAllCurrency();
        foreach ($curencies as $currency) {
            $priceItem = [];
            $priceItem['currency_id'] = $currency->id;
            $priceItem['price'] = round($product->price / $product->currency->course * $currency->course,
                $currency->round);
            $prices[] = $priceItem;
        }
        return $prices;
    }


}
