<?php

namespace TrekSt\Modules\ProductsReviews\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\ProductsReviews\Repository\Admin\ProductsReviewsAnswerRepository;
use TrekSt\Modules\ProductsReviews\Repository\Admin\ProductsReviewsRepository;
use Validator;
use Session;

class ProductsReviewsController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->reviewsRepository = new ProductsReviewsRepository();
        $this->reviewsAnswerRepository = new ProductsReviewsAnswerRepository();
    }


    public function index(Request $request)
    {

        $queryArray = [];
        if (!empty($request->search)) {
            $queryArray['keyword'] = $request->search;
        }
        if (!empty($request->products_id)) {
            $queryArray['products_id'] = $request->products_id;
        }
        $products_reviews = $this->reviewsRepository->paginateIndex($queryArray);
        $this->setCurrentBreadcrumbs('admin.products_reviews.index');

        return view('admin.products_reviews.index', compact('products_reviews'));
    }


    public function show($id)
    {
        $review = $this->reviewsRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.products_reviews.show', $review);
        return view('admin.products_reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $review = $this->reviewsRepository->getForEdit($id);
        $this->setCurrentBreadcrumbs('admin.products_reviews.edit', $review);
        return view('admin.products_reviews.edit', compact('review'));
    }


    public function update($id, Request $request)
    {
        $rules = [
            "description" => ["required", "string", "min:3", "max:20000"],
            "published" => ['required', "boolean"],
            "rating" => ['required', "integer", 'min:1', 'max:5'],
            "date_of_sending" => ['date_format:Y-m-d H:i:s', 'required'],
        ];
        $this->validate($request, $rules);
        $requestData = $request->only(["description", "published", 'rating', 'date_of_sending']);

        $review = $this->reviewsRepository->updateById($id, $requestData);
        Session::flash('flash_message', 'Відгук оновлений');

        return redirect(route("admin.products-reviews.edit", ["id" => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $review = $this->reviewsRepository->deleteById($id);
        Session::flash('flash_message', "Відгук видалено");
        return back();
    }

    public function updateCreateAnswer($id, Request $request)
    {
        $rules = [
            //"products_reviews_id" => ["required","integer","exists:products_reviews,id"],
            "name" => ["required", "string", "min:3", "max:255"],
            "user_name" => ["required", "string", "min:3", "max:255"],
            "description" => ["required", "string", "min:3", "max:20000"],
            "date_answer" => ['date_format:Y-m-d', 'required'],
            "published" => ['required', "boolean"],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('flash_warning', "Відповідь на відгук не пройшла валідацію");
            return back()->withErrors($validator,
                "products_reviews_answer")->withInput(["products_reviews_answer" => $request->all()]);
        }
        $reviews = $this->reviewsRepository->getForEdit($id);
        $answer = $reviews->answer;
        $requestData = $request->only(['name', "user_name", "description", "date_answer", "published"]);
        if ($answer == null) {
            $requestData['products_reviews_id'] = $id;
            $this->reviewsAnswerRepository->create($requestData);
            Session::flash('flash_message', 'Відповідь створено');

        } else {
            $this->reviewsAnswerRepository->updateById($answer->id, $requestData);
            Session::flash('flash_message', 'Відповідь оновлено');
        }
        return back();
    }

    public function deleteAnswer($id)
    {
        $this->reviewsRepository->deleteAnswerById($id);
        Session::flash('flash_message', "Відповідь видалено");
        return back();
    }


    public function deleteMass(Request $request)
    {
        $rules = array('elements.*' => ['required', "min:0", "integer"]);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('flash_warning', "Надіслані дані не відподвють формату {revised} ");
            return back();
        }
        $this->reviewsRepository->delete($request->elements);
        Session::flash('flash_message', "Елементи Видалено");
        return redirect(route("admin.products-reviews.index"));
    }


    public function revised(Request $request)
    {
        $rules = array('elements.*' => ['required', "min:0", "integer"]);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('flash_warning', "Надіслані дані не відподвють формату  ");
            return back();
        }
        $this->reviewsRepository->setAsRevised($request->elements);
        Session::flash('flash_message', "Елементи позначено як прочитанні");
        return back();
    }

}
