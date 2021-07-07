<?php

namespace  TrekSt\Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PermissionStoreRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->id;
        $rules =  [
            'name' =>[ 'required',"min:3","max:255",'unique:permissions,name,'.$this->id,  ],
        ];
        return $rules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => \Str::lower( trim($this->name)),
        ]);
    }


}
