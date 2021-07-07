<?php

namespace TrekSt\Modules\Categories\Http\Requests;

use TrekSt\Modules\Categories\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class CategoriesStoreRequest extends FormRequest
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
            'parent_id' => ["nullable", "integer", "exists:categories,id"],
            'order' => ["required", "integer"],
             'slug' => ['required', 'string', 'min:2', 'max:255'],
            'name' => ["required", "string", "max:255", "min:2"],
            'published' => ['required', 'boolean'],
        ];


        switch ($this->method()) {
            case 'POST':
                {
                    $rules["slug"][] = "unique:categories,slug";
                }
            case 'PUT':
            case 'PATCH':
                {
                    $rules["slug"][] = "unique:categories,slug," . $this->id;
                }
            default:
                break;
        }
        return $rules;


    }


    protected function getValidatorInstance()
    {
        return parent::getValidatorInstance()->after(function ($validator) {
            $this->after($validator);
        });
    }

    public function after($validator)
    {
        $request = $this->request;
        switch ($this->method()) {

            case 'PUT':
            case 'PATCH':
                {
                    $id = $this->id;
                    $category = Category::findOrFail($id);
                    if ($request->get("parent_id") !== null && $category->parent_id != $request->get("parent_id") && $category->childrens()->count()) {
                        $validator->errors()->add('parent_id', 'Батьківська категорія не може мінятися якщо є підкатегорії');
                    }
                }
            default:
                break;
        }
    }




//    public function all( $keys = null)
//    {
//        $input = parent::all();
//        if ( (!isset($input['slug']) || empty($input['slug']) )&& !empty($input['name']))
//        {
//            $input['slug'] = mb_strtolower( Str::slug($input['name']));
//        }
//        else{
//            $input['slug'] =  mb_strtolower( Str::slug($input['slug']));
//        }
//        return $input;
//    }


    protected function prepareForValidation()
    {

        $method = $this->method();
        $slug = '';
        $isEdit = in_array($this->method(),['PUT','PATCH']);

        if ( empty($this->slug)   && !empty($this->name) && !$isEdit)
        {
            $statement = \DB::select("show table status like 'categories'");
            $slug = mb_strtolower( Str::slug($this->name.'-'.$statement[0]->Auto_increment  ));
        }
        else{
            $slug =  mb_strtolower( Str::slug($this->slug));
        }
        request()->merge([
            'slug' => $slug
        ]);
        $this->merge([
            'slug' => $slug
        ]);

    }


}
