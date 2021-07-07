<?php

namespace TrekSt\Modules\Delivery\Resources\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryWarehousesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cities_id' => $this->CityId,
            'title' => $this->address,
            'value' => $this->address,

        ];
    }
}
