<?php

namespace TrekSt\Modules\LandingPages\Http\Controllers\Admin;


use Session;
use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\News\Repositories\Admin\LandingPagesItemsRepository;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TrekSt\Modules\LandingPages\Models\LandingPagesItem;
use TrekSt\Modules\LandingPages\Http\Requests\LandingPagesItemRequest;



class LandingPagesItemsController extends Controller
{

    public function __construct()
    {
      $this->itemsReposytory  = new  LandingPagesItemsRepository(new LandingPagesItem, new Language() );


        $this->middleware('permission:pages.edit')->only(['store','delete','update']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.landing_pages.create');

    }

    public function store(Request $request)
    {

       $validateData = $this->validate($request,[
            'landing_pages_id'  => ['required','integer','exists:landing_pages,id'],
            'languages_id'      => ['required','integer','exists:languages,id'],
            'type'              => ['required','string','min:1','max:255'],
            'name'              => ['required','string','min:1','max:255'],
        ]);
        $item =   $this->itemsReposytory->create($validateData);
        Session::flash('flash_message', 'Блок додано!');
        return $this->back();
    }


    public function update($id, Request $request)
    {
        $rules = [
            'published' => ["required", "boolean"],
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'value' => ['nullable', 'string', 'min:0', 'max:1000000'],
            'classes' => ['nullable', 'string', 'min:0', 'max:1000000'],
            'styles' => ['nullable', 'string', 'min:0', 'max:1000000'],
            'javascript' => ['nullable', 'string', 'min:0', 'max:1000000'],
            'order' => ['required', 'integer'],
            'published' => ['required', 'boolean'],
        ];

        $validator = Validator::make($request->all(), $rules);
        $back = back();
        $back->setTargetUrl($back->getTargetUrl() . "#items_tab_block");
       $item =   $this->itemsReposytory->get($id);


        if ($validator->fails())
        {
            Session::flash('flash_warning', "Блок '{$item->name}' не пройшов валідацію" );
            return $back->withErrors($validator,"landing_page_item_errors_".$id)->withInput(["landing_page_item_old_".$id => $request->all()]);
        }
        $requestData = $request->except(['languages_id','languages_id','type']);
        $this->itemsReposytory->updateById($id,$requestData);
        Session::flash('flash_message', 'Блок оновлено!');
        return $this->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Request $request)
    {
        $item =  $this->itemsReposytory->deleteById($id);
        Session::flash('flash_message', "Блок з назвою '{$item->name}' видалено!");
        return back();
    }


    protected function back()
    {
        $back= back();
        $back->setTargetUrl($back->getTargetUrl() . "#items_tab_block");
        return $back;
    }



}
