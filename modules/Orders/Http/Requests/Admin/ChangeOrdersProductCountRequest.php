<?php

namespace TrekSt\Modules\Order\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;
use TrekSt\Modules\Orders\Models\Order;

class ChangeOrdersProductCountRequest extends FormRequest
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
            'quantity' => ['required', 'integer', 'min:1', 'max:10000'],
            'id' => [
                'bail', 'required', 'exists:orders_products,id', function ($attribute, $value, $fail) {
                    $exists = \DB::table('orders_products')
                        ->join('products', 'products.id', '=', 'orders_products.products_id')->where('orders_products.id', $value)->exists();
                    if (!$exists) {
                        \Session::flash('flash_warning', 'Товар вже не існує ');
                        $fail('Товар вже не існує');
                    }

                },
                function ($attribute, $value, $fail) {
                    $exists = \DB::table('orders_products')
                        ->join('orders', 'orders.id', '=', 'orders_products.orders_id')
                        ->where(['orders_products.id' => $value, 'orders.status'=>Order::BEING_PROCESSED])->exists();
                    if (!$exists) {
                        \Session::flash('flash_warning',  "Замовлення лише в статусі  '" . __("order.status.1") . "' дозволяється редагувати");
                        $fail( "Замовлення лише в статусі  '" . __("order.status.1") . "' дозволяється редагувати");
                    }

                }
            ]
        ];

        return $rules;
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->id
        ]);
    }


}
