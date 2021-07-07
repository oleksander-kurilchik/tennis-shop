<?php

namespace TrekSt\Modules\Categories\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesImageCreateRequest extends FormRequest
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


    public function rules()
    {
        return [
            "images"=>["required","array"],
            "images.*"=>
                ['required','image','mimes:gif,jpeg,png',
                    'dimensions:min_width=10,min_height=10,max_width=4000,max_height=4000','min:1','max:10000',],
            "categories_id"=>"required|integer|min:0"
        ];
    }
}
