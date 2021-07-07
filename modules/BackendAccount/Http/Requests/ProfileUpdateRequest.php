<?php

namespace TrekSt\Modules\BackendAccount\Http\Requests;

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
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255',new Phone()],

                'name_uk' => ['nullable', 'string', 'max:255'],
                'name_ru' => ['nullable', 'string', 'max:255'],
                'name_en' => ['nullable', 'string', 'max:255'],

              ];
    }
}
