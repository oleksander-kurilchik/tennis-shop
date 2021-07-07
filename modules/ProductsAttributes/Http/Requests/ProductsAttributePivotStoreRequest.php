<?php

namespace TrekSt\Modules\ProductsAttributes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;

class ProductsAttributePivotStoreRequest extends FormRequest
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
        $languages = \DB::table('languages')->get();
        $rules = [
            'order' => ['required', 'integer'],
        ];

        foreach ($languages as $lang) {
            $rules['value_text.'.$lang->value] = ['required', 'string', 'max:10000'];
        }
        $rules['product_id'] = ['required', 'exists:products,id'];
        $rules['product_attribute_id'] = ['required', 'exists:products_attributes,id'];

        return $rules;
    }


}
