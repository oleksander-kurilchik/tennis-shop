<?php

namespace TrekSt\Modules\ProductsAttributes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;

class ProductsAttributePivotUpdateRequest extends FormRequest
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
        return $rules;
    }


}
