<?php
namespace TrekSt\Modules\MainSlider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainSliderRequest extends FormRequest
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
        $rules =  [
            'name' => 'required|string|min:3|max:255',
           /* 'title' => 'required|string|min:0|max:255',
            'description' => 'required|string|min:0|max:500',*/
            'url' => 'string|min:0|max:255|nullable',
           // 'url_text' => 'string|min:0|max:500|nullable',
            'order' => 'required|integer',
            'published' => 'required|boolean',

            'languages_id' => ['nullable','integer','exists:languages,id'],
//             'image' => ['file','mimes:gif,jpg,jpeg,bmp,png','dimensions:min_width=1340,min_height=800,max_width=30000,max_height=30000' ],
             'image' => ['file','mimes:gif,jpg,jpeg,bmp,png','dimensions:min_width=2080,min_height=960,max_width=10000,max_height=10000' ],
             'image_sm' => ['file','mimes:gif,jpg,jpeg,bmp,png','dimensions:min_width=1035,min_height=1140,max_width=10000,max_height=10000' ],

        ];
        switch($this->method())
        {
            case 'POST':
            {
                $rules['image'][]='required';
            }
            case 'PUT':
            case 'PATCH':
            {
            }
            default:break;
        }
        return $rules;
    }

}
