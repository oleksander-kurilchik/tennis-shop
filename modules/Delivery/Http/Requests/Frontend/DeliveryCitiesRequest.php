<?php

namespace TrekSt\Modules\Delivery\Requests\Frontend;


use Illuminate\Foundation\Http\FormRequest;

class DeliveryCitiesRequest extends FormRequest
{

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
            'delivery_method' => ['string', 'in:nova-poshta,delivery' ],
            'city_id' => ['required', 'string', 'max:255'],

        ];
        return $rules;
    }

}
