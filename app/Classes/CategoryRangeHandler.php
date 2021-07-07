<?php


namespace App\Classes;


use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Products\Models\Frontend\Product;
use TrekSt\Modules\Products\Repositories\Frontend\ProductsRepository;

class CategoryRangeHandler
{
    /* @var $instance  CategoryRangeHandler */
    protected static $instance;
    protected $listTags;
    public static function getInstance(): CategoryRangeHandler
    {

        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct()
    {
        $this->productsRepository  = new  ProductsRepository();

    }

    public function getPriceRange($query)
    {
        $rangePrice = new class extends Model {
        };
        $requestFrom = (int) \Request::get('price-from');
        $requestTo = (int) \Request::get('price-to');
        $minMax =  $this->productsRepository->getMinMaxPriceForQuery($query);

        $rangePrice->min = $minMax->min;
        $rangePrice->max = $minMax->max;
        $rangePrice->start = $requestFrom!=0 ?$requestFrom: $rangePrice->min;
        $rangePrice->end = $requestTo!=0 ?$requestTo: $rangePrice->max;
        if ($rangePrice->min ==  $rangePrice->max){
            $rangePrice->max++;
            $rangePrice->min--;
        }

        return $rangePrice;

    }




}
