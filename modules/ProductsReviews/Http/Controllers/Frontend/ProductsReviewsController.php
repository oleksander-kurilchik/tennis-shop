<?php

namespace TrekSt\Modules\ProductsReviews\Http\Controllers\Frontend;

 use App\Mail\NewProductReview;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Lang;
use Mail;
 use TrekSt\Modules\ProductsReviews\Http\Requests\Frontend\AddReviewsRequest;
 use TrekSt\Modules\ProductsReviews\Repository\Frontend\ProductsReviewsRepository;
 use TrekSt\Modules\ProductsReviews\Resources\ProductReviewsResource;

 class ProductsReviewsController extends Controller
{

    public function __construct(){
        $this->repository = new ProductsReviewsRepository();
    }

    public function add(AddReviewsRequest $request)
    {

        $requestData = $request->validated();

        $requestData['ip'] = $request->ip();
        $requestData['user_agent'] = $request->userAgent();
        $requestData['date_of_sending'] =  Carbon::now();
        $review = $this->repository->create($requestData);


//        Mail::to(config('site.mail_info'),'Новий відгук')->send(new NewProductReview($review ));

         $reviews = ProductReviewsResource::collection($this->repository->getForProduct($request->products_id));

         return ['status'=>true, 'title'=>trans('products_reviews.success.title'), 'message'=>trans('products_reviews.success.message'),'reviews'=>$reviews];


    }

    public function getReviewsForProduct(Request $request)
    {
        $this->validate($request, ["products_id" => ["required", "integer", "exists:products,id"]]);
        $reviews = ProductReviewsResource::collection($this->repository->getForProduct($request->products_id));
        return $reviews;
    }

//    public function index()
//    {
//        $reviews = ProductsReviews::query()->orderByDesc('date_of_sending')->published()->with(['answer', 'product', 'product.trans'])->paginate(15);
//
//        $_page = Page::where('alias', '_reviews_index')->with('trans')->first();
//        if ($_page == null) {
//            $seoValue = new ExtClass();
//        } else {
//            $seoValue = $_page->trans;
//        }
//        return $this->makeView('frontend.reviews.index', compact('seoValue', 'reviews'));
//    }


}
