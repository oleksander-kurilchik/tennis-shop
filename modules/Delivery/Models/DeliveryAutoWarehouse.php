<?php

namespace TrekSt\Modules\Delivery\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAutoWarehouse extends Model
{
    protected $table = 'delivery_auto_warehouses';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'CityId',
        'address',
        'operatingTime',
        'Phone',
        'EmailStorage',
        'Latitude',
        'latitude',
        'longitude',
        'Longitude',
        'Office',
        'CityName',
        'IsWarehouse',
        'RcPhoneSecurity',
        'RcPhoneManagers',
        'RcPhone',
        'RcName',
        'WarehouseForDeliveryId',
        'WarehouseType'
    ];

}
