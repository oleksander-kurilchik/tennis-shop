<?php

namespace  TrekSt\Modules\Filters\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class FiltersValueStoreRequest extends FormRequest
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
            'name' => ['required', 'min:1', 'max:255'],
            'order' => ['required', 'integer'],
//            'slug' => ['required','min:1','max:255'],
            'published' => ['required', 'boolean'],
            'filters_id' => ['required', 'integer', 'exists:filters,id']
        ];
        switch ($this->method()) {
            case 'POST':
            {
//                  $rules['slug'][] = 'unique:filters_values,slug';
            }
            case 'PUT':
            case 'PATCH':
            {
//                $rules['slug'][] = 'unique:filters_values,slug,'.$this->id;
            }
            default:break;
        }
        return $rules;
    }


//    public function all( $keys = null)
//    {
//        $input = parent::all();
//        if ( (!isset($input['slug']) || empty($input['slug']) )&& $input['name']!==null)
//        {
//            $input['slug'] = mb_strtolower( Str::slug($input['name']));
//        }
//        else{
//            $input['slug'] =  mb_strtolower( Str::slug($input['slug']));
//        }
//        return $input;
//    }


}
