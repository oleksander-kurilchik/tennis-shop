<?php

namespace TrekSt\Modules\Delivery\Models;

use Illuminate\Database\Eloquent\Model;

class NovaposhtaCity extends Model
{
    protected $table = 'novaposhta_cities';
    protected $primaryKey = 'id';
    protected $fillable =
        [
            'Description',
            'DescriptionRu',
            'Ref',
            'Delivery1',
            'Delivery2',
            'Delivery3',
            'Delivery4',
            'Delivery5',
            'Delivery6',
            'Delivery7',
            'Area',
            'SettlementType',
            'IsBranch',
//            'PreventEntryNewStreetsUser',
          //  'Conglomerates',
            'CityID',
            'SettlementTypeDescriptionRu',
            'SettlementTypeDescription'
        ];

    public function warehouses(){
        return $this->hasMany(NovaposhtaWarehouse::class , 'CityRef', 'Ref');
    }
}
