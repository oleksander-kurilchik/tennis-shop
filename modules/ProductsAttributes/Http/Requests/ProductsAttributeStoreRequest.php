<?php

namespace TrekSt\Modules\ProductsAttributes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;

class ProductsAttributeStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'order' => ['required', 'integer'],
            'published' => ['required', 'boolean'],
        ];

        foreach ($languages as $lang) {
            $rules['title.'.$lang->value] = ['required', 'string', 'max:10000'];
        }

        if ($this->method() ==  'POST') {
            $rules['group_id']  = ['required','exists:products_attributes_groups,id'];
        }
        return $rules;
    }


}
