<?php

namespace TrekSt\Modules\Products\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Categories\Models\CategoriesTranslating;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Categories\Repositories\Admin\CategoriesRepository;
use TrekSt\Modules\Currencies\Models\Currency;
use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\Products\Http\Requests\ProductStoreRequest;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Models\ProductsImage;
use TrekSt\Modules\Products\Models\ProductsTranslating;
use TrekSt\Modules\Products\Repositories\Admin\ProductsImagesRepository;
use TrekSt\Modules\Products\Repositories\Admin\ProductsRepository;
use TrekSt\Modules\Products\Services\ProductsImageService;
use Validator;


class ProductsController extends  AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->productsRepository = new ProductsRepository();
        $this->categoriesRepository = new CategoriesRepository(new Category, new Language, new CategoriesTranslating);
        $this->imageService = new ProductsImageService();
        $this->imageRepository = new ProductsImagesRepository( );


        $this->middleware('permission:products.index')->only(['index']);
        $this->middleware('permission:products.show')->only(['show']);
        $this->middleware('permission:products.edit')
            ->only(['edit','update','order','new','top','sale','published','price','old_price']);
        $this->middleware('permission:products.create')->only(['create','store']);
        $this->middleware('permission:products.delete')->only(['destroy']);


    }

    public function index(Request $request)
    {

        $categories = $this->categoriesRepository->getLevelList();

        $queryArray = [];
        if (!empty($request->search)) {
            $queryArray['keyword'] = $request->search;
        }
        if (!empty($request->sale)) {
            $queryArray['sale'] = $request->sale;
        }
        if (!empty($request->new)) {
            $queryArray['sale'] = $request->new;
        }
        if (!empty($request->category)) {
            $queryArray['categories_id'] = $request->category;
        }

        $products = $this->productsRepository->paginateIndex($queryArray);
        $this->setCurrentBreadcrumbs('admin.products.index');
        return $this->view('admin.products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.products.create');
        $currencies = Currency::all();
        $categories = $this->categoriesRepository->getLevelList();
        return $this->view('admin.products.create',compact( 'currencies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductStoreRequest $request)
    {

        $requestData = $request->validated();
        $product = $this->productsRepository->create($requestData);
        Session::flash('flash_message', 'Товар створений!');
        return redirect(route("admin.products.edit", ["id" => $product->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.products.show',$product);
        return $this->view('admin.products.show', compact('product'));
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
        $product = $this->productsRepository->getForEdit($id);
        $currencies = Currency::all();
        $categories = $this->categoriesRepository->getLevelList();
        $this->setCurrentBreadcrumbs('admin.products.edit',$product);
         return $this->view('admin.products.edit',
            compact('currencies','categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ProductStoreRequest $request)
    {
        $requestData = $request->validated();
        $product = $this->productsRepository->updateById($id,$requestData);
        Session::flash('flash_message', 'Товар оновлений!');
        return redirect(route("admin.products.edit",["id"=>$product->id]));
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
//        $product = Product::findOrFail($id);
//        $product->delete();

        $images = $this->imageRepository->allByProduct($id);
        foreach ($images as $image){
            $this->imageService->deleteImage($image->image_name);
            $images = $this->imageRepository->deleteById($image->id);
        }

        $category = $this->productsRepository->deleteById($id);



        Session::flash('flash_message', 'Товар видалено!');
        return redirect(route("admin.products.index"));
    }

    public function order($id, Request $request)
    {
        $this->validate($request, ["order" => ["required", "integer"]]);
        $product = $this->productsRepository->updateOrderById($id,$request->order);
        if($request->ajax())
        {
            return ["success"=>true,"order"=>$request->order];
        }
        return back();
    }






    public function searchJson(Request $request)
    {
        $this->validate($request,["search"=>"required|string|min:2|max:255"]);
        $keyword = $request->get('search');
        $perPage = 25;
            $products = Product::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('vendor_code', 'LIKE', "%$keyword%")
//                ->orWhere('price', 'LIKE', "%$keyword%")
                ->limit($perPage)->get();

            $prod_arr = $products->toArray();
        return response()->json($prod_arr, 200);

    }





    public function makeProductCopy($id)
    {
        $product = Product::findOrFail($id);
        $copy = $product->makeCopy();
        return redirect(route("admin.products.edit",["id"=>$copy->id]));

    }



    public function sale($id, Request $request)
    {
        $this->validate($request, ["sale" => ["required", "boolean"]]);
        $product = Product::findOrFail($id);
        $product->update(["sale" => $request->sale]);
        return back();
    }

    public function top($id, Request $request)
    {
        $this->validate($request, ["top" => ["required", "boolean"]]);
        $product = Product::findOrFail($id);
        $product->update(["top" => $request->top]);
        return back();
    }
    public function new($id, Request $request)
    {
        $this->validate($request, ["new" => ["required", "boolean"]]);
        $product = Product::findOrFail($id);
        $product->update(["new" => $request->new]);
        return back();
    }
    public function published($id, Request $request)
    {
        $this->validate($request, ["published" => ["required", "boolean"]]);
        $product = Product::findOrFail($id);
        $product->update(["published" => $request->published]);
        return ['success'=>true , 'message' => $request->published?"Товар '{$product->name}' опубліковано":"Товар '{$product->name}'  приховано"];
        return back();
    }



    public function price($id, Request $request)
    {
        $this->validate($request, ["price" => ["required", "numeric","min:0.1","max:1000000"]]);
        $product = Product::findOrFail($id);
        $product->update(["price" => $request->price]);
        if ($request->ajax()) {
            return ['success' => true, 'message' => "Ціну для товару \"{$product->name}\" змінено на :".$request->price ];
        }
        return back();
    }

    public function old_price($id, Request $request)
    {
        $this->validate($request, ["old_price" => ["required", "numeric","min:0","max:1000000"]]);
        $product = Product::findOrFail($id);
        $product->update(["old_price" => $request->old_price]);
        return back();
    }



}
