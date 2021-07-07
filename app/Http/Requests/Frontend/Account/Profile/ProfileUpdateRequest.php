<?php

namespace App\Http\Requests\Frontend\Account\Profile;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Phone\Phone;

class ProfileUpdateRequest extends FormRequest
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
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
//                'patronymic' => ['nullable', 'string', 'max:255'],
                'phone' => ['required', 'string', new Phone()],
//                'city' => ['required', 'string', 'max:255'],
//                 'address' => ['nullable', 'string', 'max:1000'],
              ];
    }
}
