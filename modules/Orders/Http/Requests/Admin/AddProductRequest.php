<?php

namespace TrekSt\Modules\Order\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;
use TrekSt\Modules\Orders\Models\Order;

class AddProductRequest extends FormRequest
{
    protected $errorBag = 'orders_products_add';

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
        $orders_id = $this->orders_id;
        $rules = [
            'orders_product_add' => [
                'required', 'integer', 'exists:products,id', function ($attribute, $value, $fail) use($orders_id) {
                    if(\DB::table('orders_products')->where(['products_id'=>$value,'orders_id'=>$orders_id])->exists())
                    {
                        \Session::flash('flash_warning', 'Товар вже  існує в ордері ');
                        $fail('Товар вже  існує в ордері ');
                    }

                },
            ],
            'orders_id'=>['required','exists:orders,id',function ($attribute, $value, $fail) {

            },]

        ];

        return $rules;
    }




}
