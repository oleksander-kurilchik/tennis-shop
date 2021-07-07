<?php

namespace  TrekSt\Modules\Filters\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class FilterStoreRequest extends FormRequest
{
//    use slugTranslitarateTrait;

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
        $rules =  [
            'name' =>[ 'required',"min:1","max:255"],
            'order' => ['required',"integer"],
//            'slug' => ['required',"min:3","max:255"],
            'published' => ['required',"boolean"],
//            'categories_id' => ['nullable',"integer",/*"exists:categories,id"*/]
        ];
        switch($this->method())
        {
//            case 'POST':
//            {
//                $rules["slug"][] = "unique:filters,slug";
//            }
//            case 'PUT':
//            case 'PATCH':
//            {
//                $rules["slug"][] = "unique:filters,slug,".$this->id;
//            }
//            default:break;
        }
        return $rules;
    }


}
