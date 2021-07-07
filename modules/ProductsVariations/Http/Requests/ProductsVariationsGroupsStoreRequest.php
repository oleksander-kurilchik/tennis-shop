<?php

namespace TrekSt\Modules\ProductsVariations\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;

class ProductsVariationsGroupsStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'min:1', 'max:255'],
            'order' => ['required', 'integer'],
            'published' => ['required', 'boolean'],
//            'products_id' => ['required', 'integer'],
        ];
        foreach ($languages as $lang) {
            $rules['title.'.$lang->value] = ['required', 'string','max:10000'];
        }
        return $rules;
    }


}
