<?php

namespace TrekSt\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
use Session;
use Route;
use CurrencyHandler;

class OrdersService extends Model
{
    protected $table = 'orders_services';
    protected $primaryKey = 'id';
    protected $fillable = ['orders_id','name','title','description','price'];


    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function prices(){
        return $this->hasMany(OrdersServicesPrice::class,'orders_services_id');
    }



    public static function getStatusesForSelect(){
        return [
            0 => "Прийнято",
            1 => "В процесі",
            2 => "Виконано",
        ];
    }

    public function getStatusTextAttribute(){
        switch ($this->status){
            case 0:{return'Прийнято' ;}
            case 1:{return'В процесі' ;}
            case 2:{return'Виконано' ;}
        }
    }


    public function delete()
    {
        $this->prices()->delete();
        return parent::delete();
    }

    public function services()
    {
        return $this->hasMany(OrdersService::class, 'orders_id');
    }


}
