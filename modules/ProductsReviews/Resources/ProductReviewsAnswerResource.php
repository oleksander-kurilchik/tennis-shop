<?php

 namespace TrekSt\Modules\ProductsReviews\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewsAnswerResource extends JsonResource
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
            'user_name' => $this->user_name,
            'description' => $this->description,
            'date' => $this->date,

        ];
    }
}
