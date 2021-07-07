<?php

namespace TrekSt\Modules\Menus\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class MenuItemStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'title_ru' => ['required', 'string', 'max:255', 'min:2'],
            'title_uk' => ['required', 'string', 'max:255', 'min:2'],
//            'title_en' => ['required', 'string', 'max:255', 'min:2'],
            'url_ru' => ['required', 'string', 'min:1', 'max:1000'],
            'url_uk' => ['required', 'string', 'min:1', 'max:1000'],
//            'url_en' => ['required', 'string', 'min:1', 'max:1000'],
            'published' => ['required', 'boolean'],
//            'image' => ['file','mimes:gif,jpg,jpeg,bmp,png','dimensions:min_width=130,min_height=130,max_width=1000,max_height=1000' ],
            'menu_id' => ['required', 'exists:menus,id'],
            'target' => ['required',   Rule::in(['_self', '_parent', '_top', '_blank'])],



        ];


        return $rules;


    }





}
