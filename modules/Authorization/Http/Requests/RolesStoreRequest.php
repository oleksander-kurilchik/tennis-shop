<?php

namespace  TrekSt\Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RolesStoreRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->id;
        $rules =  [
            'name' =>[ 'required',"min:3","max:255",'unique:roles,name,'.$this->id,function($attribute, $value, $fail)use($id){
                if(\DB::table('roles')->where(['name'=>'super-admin','id'=>$id ])->exists()){
                    $fail('Дану роль не можна редагувати');
                }
            } ],
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
