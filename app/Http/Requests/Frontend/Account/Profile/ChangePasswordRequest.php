<?php

namespace App\Http\Requests\Frontend\Account\Profile;

use Illuminate\Foundation\Http\FormRequest;

class  ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::guard('frontend')->user()){
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => [
                'required', 'string', 'max:255', function ($attribute, $value, $fail) {
                    $password = \Auth::guard('frontend')->user()->password;
                    $old_password = $value;
                    if ( !\Hash::check($old_password, $password) ) {
                        $fail('Старий пароль не співпадає');
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
