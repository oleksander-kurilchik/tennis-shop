<?php

namespace TrekSt\Modules\ProductsReviews\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $answer = null;
        if($this->answer){
            $answer = new ProductReviewsAnswerResource($this->answer);
        }

        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'description' => $this->description,
            'date' => $this->date,
            'answer' => $answer,
//            'rating' => $this->rating,

        ];
    }
}
