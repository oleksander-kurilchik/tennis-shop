<?php

namespace TrekSt\Modules\Delivery\Resources\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class NovaPoshtaWarehousesResource extends JsonResource
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
            'id' => $this->Ref,
            'cities_id' => $this->CityRef,
            'title' => $this->DescriptionRu,
            'value' => $this->DescriptionRu,

        ];
    }
}
