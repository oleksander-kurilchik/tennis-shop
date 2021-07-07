<?php


namespace TrekSt\Modules\FrontendUsers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Phone\Phone;

class UserRequest extends FormRequest
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
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],

            'phone' => ['required', 'string', 'max:255', new Phone() ],
            'status' => ['required','string' ,'in:active,blocked'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:frontend_users,email,'.$this->id],
            'password' => [ 'string', 'min:8', 'confirmed'],

        ];
        switch ($this->method()) {
            case 'POST':
                {
                    $rules['password'][] = 'required';
                }
                break;
            case 'PUT':
            case 'PATCH':
                {
                    $rules['password'][] = 'nullable';
                }
            default:
                break;
        }
        return $rules;
    }



}
