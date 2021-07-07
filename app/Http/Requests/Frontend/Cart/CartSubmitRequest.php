<?php

namespace App\Http\Requests\Frontend\Cart;

use App\Rules\CustomPhone;
use Illuminate\Foundation\Http\FormRequest;

class CartSubmitRequest extends FormRequest
{
    protected $errorBag = 'cartForm';
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
        $delivery_method =  $this->delivery_method;
        $rules = [
//            'user_message' => ['nullable', 'string', 'max:255'],
//            'g-recaptcha-response' => 'required|captcha',

            'payment_method'    => ['required', 'string', 'in:cod,cash,bank_card' ],
            'delivery_method'   => ['required', 'string', 'in:self-pickup,nova-poshta,courier'],

            'not_call_me'=>['nullable','boolean'],
        ];
        if ($delivery_method=='nova-poshta'||$delivery_method=='courier' ){
            $rules =  array_merge($rules,[
                'city_id'           => ['required','string', 'min:2' ],
                'warehouse_id'      => ['required','string', 'min:2'],
                'city_name'         => ['required','string', 'min:2'],
                'warehouse_name'    => ['required','string', 'min:2'],
            ]);
        }



        if(!\Auth::guard('frontend')->check()){
            $rules = array_merge($rules,[
                'first_name' => ['min:3', 'max:255', 'required', 'string'],
                'last_name' => ['min:3', 'max:255', 'required', 'string'],
                'email' => ['min:3', 'max:255', 'required', 'string', 'email'],
                'phone' => [ 'required', 'string', new CustomPhone()],
            ]);
        }
        return $rules;
    }
    protected function prepareForValidation()
    {
     /*
        throw (new ValidationExceptio($this->getValidatorInstance()))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());*/
    }


    public function messages()
    {
        return trans('cart_submit.messages');
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('cart_submit.attributes');
    }

}
