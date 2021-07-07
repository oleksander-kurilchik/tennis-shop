<?php

namespace  TrekSt\Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserRolesStoreRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules =[
            'roles' => ['array'],
            'roles.*'=>['integer','exists:roles,id']
        ];
        return $rules;
    }



}
