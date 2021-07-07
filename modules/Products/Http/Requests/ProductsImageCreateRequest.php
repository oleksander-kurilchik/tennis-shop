<?php
namespace TrekSt\Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class ProductsImageCreateRequest extends FormRequest
{
    protected $errorBag = 'product_images';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
//        return [
////            'image'=>'required|file|mimes:gif,jpeg,jpeg,bmp,png|dimensions:min_width=1000,min_height=1000,max_width=10000,max_height=10000|min:1|max:10000',
//            'image'=>'required|file|mimes:gif,jpeg,jpeg,bmp,png|dimensions:min_width=600,min_height=600,max_width=10000,max_height=10000|min:1|max:10000',
//            'products_id'=>'required|integer|min:0'
//        ];

        return [
            "images" => ["required", "array"],
            "images.*" =>
                [
                    'required', 'image', 'mimes:gif,jpeg,png',
                    'dimensions:min_width=999,min_height=999,max_width=4000,max_height=4000', 'min:1', 'max:10000',
                ],
            "products_id" => "required|integer|min:0"
        ];


    }

    public function response(array $errors)
    {
        Session::flash('flash_warning', 'Файл зображення не пройшов валидацию' );
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        return $this->redirector->to($this->getRedirectUrl().'#block_images')
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }


}
