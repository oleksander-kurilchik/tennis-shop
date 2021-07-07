<?php

namespace  TrekSt\Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RolePermissionsStoreRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules =[
            'permissions' => ['array'],
            'permissions.*'=>['integer','exists:permissions,id']
        ];
        return $rules;
    }



}
