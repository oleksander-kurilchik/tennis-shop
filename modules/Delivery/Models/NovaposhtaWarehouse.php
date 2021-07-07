<?php

namespace TrekSt\Modules\Delivery\Models;

use Illuminate\Database\Eloquent\Model;

class NovaposhtaWarehouse extends Model
{
    protected $table = 'novaposhta_warehouses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Ref',
        'SiteKey',
        'Description',
        'DescriptionRu',
        'TypeOfWarehouse',
        'Number',
        'CityRef',
        'CityDescription',
        'CityDescriptionRu',
        'Longitude',
        'Latitude',
        'PostFinance',
        'POSTerminal',
        'InternationalShipping',
        'TotalMaxWeightAllowed',
        'PlaceMaxWeightAllowed',
//        'Reception',
//        'Delivery',
//        'Schedule'
    ];

}
