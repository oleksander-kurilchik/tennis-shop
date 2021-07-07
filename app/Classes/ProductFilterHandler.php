<?php


namespace App\Classes;



use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Models\ProductsFilter;

class ProductFilterHandler
{


    public  function handle($productsQuery , $selectedFilters ){


        if (count($selectedFilters) == 0) {
            return;
        }

        $existFilters = FiltersValue::whereIn("id", $selectedFilters)->get();
        if ($existFilters->isEmpty()) {
            return;
        }

        $filters_group = $existFilters->groupBy("filters_id");
        $productsQuery = $productsQuery->whereIn("products.id", function ($query) use ($filters_group) {
            $query->from((new ProductsFilter())->getTable())->selectRaw("products_filter.products_id");

            foreach ($filters_group as $key => $group) {
                $arr = $group->pluck("id");
                $query->join("products_filter as pf_" . $key, "products_filter.products_id", "=", "pf_" . $key . ".products_id");
                $query->whereIn("pf_" . $key . ".filters_values_id", $arr);
            }
            $query->groupBy("products_filter.products_id");
        });

        return $productsQuery;

    }


}
