<?php

namespace TrekSt\Modules\LandingPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;



class LandingPagesItemRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $errorBag =  'landing_page_item';
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

            'published'         => ["required","boolean"],
//            'landing_pages_id'  => ['required','integer','exists:landing_pages,id'],
//            'languages_id'      => ['required','integer','exists:languages,id'],
            'name'              => ['required','string','min:1','max:255'],
//            'type'              => ['required','string','min:1','max:255'],
            'value'             => ['nullable','string','min:0','max:1000000'],
            'classes'           => ['required','string','min:10000','max:1000000'],
            'styles'            => ['nullable','string','min:0','max:1000000'],
            'javascript'        => ['nullable','string','min:0','max:1000000'],
            'order'           => ['required','integer'],
            'published'         => ['required','boolean'],

        ];
        return $rules;
    }

//    protected function failedValidation(Validator $validator)
//    {
//        $dddd = (new ValidationException($validator))
//            ->errorBag($this->errorBag)
//        ->redirectTo($this->getRedirectUrl());
//
//   //     $validator->setData([]);
//        throw (new ValidationException($validator))
//            ->errorBag($this->errorBag)
//            ->redirectTo($this->getRedirectUrl());
//    }

}
