<?php

namespace App\Http\Requests\Frontend\Account;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Phone\Phone;

class RegisterRequest extends FormRequest
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
        return [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
//                'patronymic' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', new Phone()],
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:frontend_users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'g-recaptcha-response' => ['required', 'captcha'],
            ];
    }
}
