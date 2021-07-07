<?php

namespace TrekSt\Modules\ProductsReviews\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;
use TrekSt\Modules\Orders\Models\Order;

class AddReviewsRequest extends FormRequest
{
    protected $errorBag = 'add_reviews';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "user_name" => ["required", "string", "min:3", "max:255"],
            "email" => ["required", "string", "email", "max:255"],
            "description" => ["required", "string", "min:3", "max:10000"],
            "products_id" => ["required", "integer", "exists:products,id"],
            "rating" => ["nullable", "integer", "min:1", 'max:5'],
//            "g-recaptcha-response" => ["required", "captcha"],
        ];

        return $rules;
    }


}
