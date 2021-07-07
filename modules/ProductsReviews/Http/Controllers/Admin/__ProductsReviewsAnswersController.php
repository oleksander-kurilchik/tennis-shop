<?php

namespace TrekSt\Modules\ProductsReviews\Http\Controllers\Admin;
use App\Models\Admin\ProductsReviews;
use App\Models\Admin\ProductsReviewsAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsReviewsAnswersController111 extends Controller
{

    protected function rules()
    {
        return [
            "products_reviews_id"=>["required","integer","exist:products_reviews,id" ],
            "name"=>["required","string","min:3","max:255"],
            "user_name"=>["required","string","min:3","max:255"],
            "description"=>["required","string","min:3","max:20000"],
            "date_answer"=>["required",'date_format:Y-m-d H:i:s' ],
            "published"=>["required","boolean"]
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules());
        $products_reviews = ProductsReviews::findOrFail($request->products_reviews);
        if($products_reviews->answer != null)
        {
            Session::flash('flash_warning', "Для даного повідомлення вже є відповідь" );
            return back();
        }
        $answer =  ProductsReviewsAnswer::create($request->all());
        Session::flash('flash_message', "Відповідь додано" );
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,$this->rules());
        $products_reviews = ProductsReviewsAnswer::findOrFail($id);
        $products_reviews->update($request->all());
        Session::flash('flash_message', "Відповідь оновлено" );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ProductsReviewsAnswer::destroy($id);
        Session::flash('flash_message', "Відповідь видалено" );

    }
    public function published($id,Request $request)
    {
        $this->validate($request,["published"=>["required","boolean"]]);
        $products_reviews = ProductsReviewsAnswer::findOrFail($id);
        $products_reviews->published = true;
        $products_reviews->save();
//        Session::flash('flash_message', "Відповідь опубліковано" );
        return back();

    }
}
