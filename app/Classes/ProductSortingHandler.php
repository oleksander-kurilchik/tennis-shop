<?php


namespace App\Classes;


 use TrekSt\Modules\Products\Models\Product;

class ProductSortingHandler
{


    public static function sort($query, $type)
    {


        switch ($type) {
            case 'price-asc':
                if (!Product::hasJoin($query->getQuery(), 'currencies')) {
                    $query->leftJoin('currencies', 'products.currencies_id', '=', 'currencies.id');
                }
                $query->orderByRaw('(products.price * currencies.course) asc');
                break;
            case 'price-desc':
                if (!Product::hasJoin($query->getQuery(), 'currencies')) {
                    $query->leftJoin('currencies', 'products.currencies_id', '=', 'currencies.id');
                }
                $query->orderByRaw('( products.price   * currencies.course) desc');
                break;
//
//            case 'name-asc':
//                if (!Product::hasJoin($query->getQuery(), 'products_translatings')) {
//                    $query->leftJoin('products_translatings', 'products_translatings.products_id', '=', 'products.id')
//                        ->where('products_translatings.languages_id', self::getLangId());
//                }
//                $query->orderBy('products_translatings.title', 'asc');
//                break;
//            case 'name-desc':
//                if (!Product::hasJoin($query->getQuery(), 'products_translatings')) {
//                    $query->leftJoin('products_translatings', 'products_translatings.products_id', '=', 'products.id')
//                        ->where('products_translatings.languages_id', self::getLangId());
//                }
//                $query->orderBy('products_translatings.title', 'desc');
//                break;
//            case 'code-asc':
//                $query->orderBy('products.vendor_code', 'asc')->orderBy('products.sorting', 'asc');
//                break;
//            case 'top-asc':
//                {
//                    $query->orderBy('products.top', 'asc')->orderBy('products.sorting', 'asc');
//                    break;
//                }
            case 'top':
                $query->orderBy('products.top', 'desc');
                break;
            case 'new':
                $query->orderBy('products.new', 'desc');
                break;
            case 'sale':
                $query->orderBy('products.sale', 'desc');
                break;
            default:
//                if (!Product::hasJoin($query->getQuery(), 'currencies')) {
//                    $query->leftJoin('currencies', 'products.currencies_id', '=', 'currencies.id');
//                }
//                $query->orderByRaw('(products.' . Product::priceField() . ' * currencies.course) asc');
                if (!Product::hasJoin($query->getQuery(), 'products_translatings')) {
                    $query->leftJoin('products_translatings', 'products_translatings.products_id', '=', 'products.id')
                        ->where('products_translatings.languages_id', \FLang::langId());
                }
                $query->orderBy('products_translatings.title', 'asc');
                break;
        }

        return $query;


    }

    protected static function getLangId()
    {
        $langLoc = LanguageLocale::getInstance();
        return $langLoc->getLocaleId();
    }


}
