<?php

namespace TrekSt\Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class SettingsStoreRequest extends FormRequest
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
        $lang = $this->languages_id;
        $key = $this->key;
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'key' => [
                'required', 'string', 'min:0', 'max:1000', 'regex:/^[a-zA-Z0-9_.-]*$/',
                Rule::unique('settings', 'key')->where(function ($query) use ($lang) {
                    return $query->where('languages_id', $lang);
                })
            ],
            'value' => 'required|string|max:100000',
            'validation_rules' => ['required', 'string', 'min:2', 'max:1000'],
            'comment' => ['nullable', 'string', 'max:1000'],
            'input_type' => ['required', 'string', 'min:2', 'max:1000'],
            'editable' => ['required', 'boolean'],
            'deleteable' => ['required', 'boolean'],
            'settings_groups_id' => ['required', 'integer', 'exists:settings_groups,id'],
            'languages_id' => [
                'nullable', 'string', 'in:uk,ru,en',
                Rule::unique('settings', 'languages_id')->where(function ($query) use ($key) {
                    return $query->where('key', $key);
                })
            ]
        ];
        return $rules;
    }

}
