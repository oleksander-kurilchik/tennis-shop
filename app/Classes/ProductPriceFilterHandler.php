<?php


namespace App\Classes;


 

class ProductPriceFilterHandler
{


    public static  function handle($productsQuery , $priceFrom , $priceTo ){


         if ($priceFrom != null && is_numeric($priceFrom)) {
            $productsQuery->priceFrom(intval($priceFrom));
        }
         if ($priceTo != null && is_numeric($priceTo)) {
             $productsQuery->priceTo(intval($priceTo));
        }

    }

    protected static function getLangId(){
        $langLoc =  LanguageLocale::getInstance();
        return $langLoc->getLocaleId();
    }


}
