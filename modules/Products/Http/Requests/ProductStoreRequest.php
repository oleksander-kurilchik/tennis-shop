<?php

namespace TrekSt\Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Transliteration;
use App\Http\Requests\Admin\Traits\slugTranslitarateTrait;

class ProductStoreRequest extends FormRequest
{
//    use slugTranslitarateTrait;

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
        $rules =  [
            'name' =>[ 'required','string','min:3','max:255'],
            'order' => ['required','integer'],
            'slug' => ['required','string','min:3','max:255'],
//            'vendor_code' => ['required','string','min:3','max:255','alpha_dash'],
            'vendor_code' => ['required','string','min:3','max:255','regex:/^[A-Za-z0-9_\-\/]*$/'],
//          'product_ids' => ['required','string','min:3','max:255','alpha_dash'],
            'quantity' => ['required','integer','min:0','max:1000000'],
            'published' => ['required','boolean'],
            'price' => ['required','numeric','min:0','max:999999'],
            'old_price' => ['nullable','numeric','min:0','max:999999' ],

            'currencies_id' => ['required','integer','exists:currencies,id' ],
            'vendors_id' => ['nullable','integer','exists:vendors,id' ],
            'sale' => ['required','boolean'],
            'new' => ['required','boolean'],
             'top' =>  ['required','boolean'],
            'available' =>  ['required','boolean'],
            'categories_id' => ['required','integer','exists:categories,id'],
        ];
        switch($this->method())
        {
            case 'POST':
            {
                $rules['slug'][] = 'unique:products,slug';
                $rules['vendor_code'][] = 'unique:products,vendor_code';
//                $rules['product_ids'][] = 'unique:products,product_ids';
             }
            case 'PUT':
            case 'PATCH':
            {
                $rules['slug'][] = 'unique:products,slug,'.$this->id;
                $rules['vendor_code'][] = 'unique:products,vendor_code,'.$this->id;
//                $rules['product_ids'][] = 'unique:products,product_ids,'.$this->id;
            }
            default:break;
        }
        return $rules;
    }


//    public function all( $keys = null)
//    {
//        $input = parent::all();
//        if ( (!isset($input['slug']) || empty($input['slug']) )&& !empty($input['name']))
//        {
//            $statement = \DB::select("show table status like 'products'");
//            $input['slug'] = mb_strtolower( Str::slug($input['name']).'-'.$statement[0]->Auto_increment);
//        }
//        else{
//            $input['slug'] =  mb_strtolower( Str::slug($input['slug']));
//        }
//        return $input;
//    }



    protected function prepareForValidation()
    {

        $slug = '';
        if ( empty($this->slug)   && !empty($this->name))
        {
            $statement = \DB::select("show table status like 'products'");
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
