<?php


namespace App\Classes;


class GetFilterFromQuery
{
        public static function getFilters($query){

            $filters_array = [];
            if ($query != null) {
                $filters_array = array_filter(explode("-", $query));
            }
            return $filters_array;
        }


}
