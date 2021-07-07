<?php

namespace TrekSt\Modules\Currencies\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Currencies\Models\Currency;


class CurrenciesController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();


        $this->middleware('permission:currencies.index')->only(['index']);
        $this->middleware('permission:currencies.edit')->only(['edit','update']);

    }

    protected function registerBreadcrumbs(): void
    {
        parent::registerBreadcrumbs();
        $this->breadcrumbsFor('admin.currencies.index', function ($breadcrumbs) {
            $breadcrumbs->parent('admin.index');
            $breadcrumbs->push(trans('admin_breadcrumbs.currencies.index'), route('admin.currencies.index'));
        });

        $this->breadcrumbsFor('admin.currencies.edit', function ($breadcrumbs, $model) {
            $breadcrumbs->parent('admin.currencies.index');
            $breadcrumbs->push(trans('admin_breadcrumbs.currencies.edit', ['id' => $model->id, 'name' => $model->name]), route('admin.currencies.edit', ['id' => $model->id]));
        });

    }


    public function index(Request $request)
    {


        $currencies = Currency::all();


        $this->setCurrentBreadcrumbs('admin.currencies.index');
        return $this->view('admin.currencies.index', compact('currencies'));
    }






    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        $currencies = Currency::all();

        $this->setCurrentBreadcrumbs('admin.currencies.edit', $currency);
        return $this->view('admin.currencies.edit', compact('currency','currencies'));
    }


    public function update($id, Request $request)
    {

         $this->validate($request,['course'=>['required','numeric','min:0.01',"max:10000"]]);
        $currency = Currency::findOrFail($id);
        $currency->course = $request->course;
        $currency->save();
        Session::flash('flash_message', 'Курс змінено');
        return back();
    }




}
