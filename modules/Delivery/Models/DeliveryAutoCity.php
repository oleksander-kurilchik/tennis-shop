<?php

 namespace TrekSt\Modules\Delivery\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAutoCity extends Model
{
    protected $table = 'delivery_auto_cities';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
            'id',
            'name',
            'RegionId',
            'IsWarehouse',
            'ExtracityPickup',
            'ExtracityShipping',
            'RAP',
            'RAS',
            'regionName'
        ];
}
