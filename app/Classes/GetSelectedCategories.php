<?php


namespace App\Classes;


class GetSelectedCategories
{
    public static function get($categories, $query)
    {

        $categories_array = [];
        if ($query != null && is_string($query)) {
            $categories_array = array_filter(explode("-", $query));
        }

        return $categories->filter(function ($item, $key) use ($categories_array) {
            return in_array($item->id, $categories_array);
        })->pluck('id');

    }


}
