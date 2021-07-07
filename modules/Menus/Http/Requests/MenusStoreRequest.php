<?php

namespace TrekSt\Modules\Menus\Http\Requests;

use Illuminate\Support\Str;
use TrekSt\Modules\Menus\Models\Admin\MenuItem;
use Illuminate\Foundation\Http\FormRequest;


class MenusStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'slug' => ['required', 'string', 'max:255', 'min:3'],
        ];
        return $rules;
    }

    protected function prepareForValidation()
    {
        $prepare = [];
        if (empty($this->slug) && !empty($this->name))
        {
            $prepare['slug'] = mb_strtolower( Str::slug($this->name));
        }
        else{
            $prepare['slug'] = mb_strtolower( Str::slug($this->slug));
        }
        $this->merge($prepare);
    }

}
