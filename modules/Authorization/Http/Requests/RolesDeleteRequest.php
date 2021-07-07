<?php

namespace TrekSt\Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesDeleteRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'id' => ['bail','required', 'exists:roles,id',function($attribute, $value, $fail){
                if(\DB::table('roles')->where(['name'=>'super-admin','id'=>$value ])->exists()){
                    $fail('Дану роль не можна видаляти');
                }
            } ],
        ];
        return $rules;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->id,
        ]);
    }


}
