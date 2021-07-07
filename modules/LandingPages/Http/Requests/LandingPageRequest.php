<?php

namespace TrekSt\Modules\LandingPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class LandingPageRequest extends FormRequest
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
            'slug'         =>  ['required','string','min:3','max:255'],
            'name'          =>  ["required","string","max:255","min:3"],
            'classes'       =>  ["nullable","string","max:255","min:0"],
            'published'     =>  ["required","boolean"],
//            "image" => ["file","mimes:gif,jpg,jpeg,bmp,png",'dimensions:min_width=100,min_height=100,max_width=30000,max_height=30000' ],

        ];
        switch($this->method())
        {
            case 'POST':
            {
                $rules["slug"][] = "unique:landing_pages,slug";
//                $rules["image"][]="required";
            } break;
            case 'PUT':
            case 'PATCH':
            {
                $rules["slug"][] = "unique:landing_pages,slug,".$this->id;
            }
            default:break;
        }
        return $rules;
    }



    public function all( $keys = null)
    {
        $input = parent::all();
        if ( (!isset($input["slug"]) || empty($input["slug"]) )&& !empty($input["name"]))
        {
            $input["slug"] = mb_strtolower( Str::slug($input["name"]));
        }
        else{
            $input["slug"] =  mb_strtolower( Str::slug($input["slug"]));
        }
        return $input;
    }

//    protected function prepareForValidation()
//    {
//        $prepare = [];
//        if (empty($this->slug) && !empty($this->name))
//        {
//            $prepare['slug'] = mb_strtolower( Str::slug($this->name));
//        }
//        else{
//            $prepare['slug'] = mb_strtolower( Str::slug($this->slug));
//        }
//        $this->merge($prepare);
//    }


}
