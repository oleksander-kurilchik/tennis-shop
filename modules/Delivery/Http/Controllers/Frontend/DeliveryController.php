<?php

namespace TrekSt\Modules\Delivery\Controllers\Frontend;


use App\Http\Controllers\Controller;
use DeliveryAuto\Auto;
use Illuminate\Http\Request;
use DB;
use TrekSt\Modules\Delivery\Models\DeliveryAutoCity;
use TrekSt\Modules\Delivery\Models\DeliveryAutoWarehouse;
use TrekSt\Modules\Delivery\Models\NovaposhtaCity;
use TrekSt\Modules\Delivery\Models\NovaposhtaWarehouse;
use TrekSt\Modules\Delivery\Resources\Frontend\DeliveryCitiesResource;
use TrekSt\Modules\Delivery\Resources\Frontend\DeliveryWarehousesResource;
use TrekSt\Modules\Delivery\Resources\Frontend\NovaPoshtaCitiesResource;
use TrekSt\Modules\Delivery\Resources\Frontend\NovaPoshtaWarehousesResource;


class DeliveryController extends Controller
{
    const NOVAPOSHTA = 'nova-poshta';
    const DELIVERY = 'delivery';
    public function getCitiesList(Request $request)
    {
        $query =  (string) $request->post('query');
        switch ($request->delivery_method) {
            case self::NOVAPOSHTA:
                {
                    $novaposhtaQuery = NovaposhtaCity::select(['Ref','Description'])->orderBy('Description');
                    if($query){
                        $novaposhtaQuery->orWhere('Description','like','%$query%')->orWhere('DescriptionRu','like','%$query%');
                    }
                    return NovaPoshtaCitiesResource::collection($novaposhtaQuery->get());
                }
                break;
            case self::DELIVERY:
                {
                    $delivertQuery  = DeliveryAutoCity::orderBy('name');
                    if($query){
                        $delivertQuery ->orWhere('name','like','%$query%');
                    }

                    return DeliveryCitiesResource::collection($delivertQuery->get());
                }
                break;
            default:
            {
                return [];
            }
        }


    }

    public function getWarehousesList(Request $request)
    {
        $guery = null;
        switch ($request->delivery_method) {
            case self::NOVAPOSHTA;
                {
                    return NovaPoshtaWarehousesResource::collection(NovaposhtaWarehouse::orderBy('DescriptionRu')->where('CityRef',
                        $request->cities_id)->get());
                }
                break;
            case self::DELIVERY;
                {
                    return DeliveryWarehousesResource::collection(DeliveryAutoWarehouse::orderBy('address')->where('CityId',
                        $request->cities_id)->get());
                }
                break;
            default:
            {
                return [];
            }
        }
    }


}
