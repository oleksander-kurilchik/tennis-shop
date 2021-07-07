<?php

namespace TrekSt\Modules\Filters\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use TrekSt\Modules\Filters\Models\FiltersTranslating;
use Illuminate\Http\Request;
use Session;
use Validator;


class FiltersTranslatingController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:filters.edit')->only(['update']);

    }

    public function update($id, Request $request)
    {
        $rules = array('title' => ['required',"min:1","max:255"],
            'description' => ['nullable','max:20000'],
            'short_description' => ['nullable','max:1000'],
            'seo_title'=>["string","nullable" ,"max:255"],
            'seo_description'=>["string","nullable","max:255"],
            'seo_keywords'=>["string","nullable","max:255"],
            'seo_text'=>["string","nullable","max:20000"]);
        $validator = Validator::make($request->all(), $rules);
        $translating =  FiltersTranslating::findOrFail($id);
        $lang = $translating->language->name;
        if ($validator->fails())
        {
            Session::flash('flash_warning', "Перевод '{$lang}' не пройшов валідацію" );
            return back()->withErrors($validator,"_translate_errors_".$id)->withInput(["_translate_old_".$id => $request->all()]);
        }
        $translating->update($request->all());
        Session::flash('flash_message', "Перевод '{$lang}'  оновлено" );

        return $this->back();
    }

    protected function back()
    {
        $back= back();
        $back->setTargetUrl($back->getTargetUrl() . "#tab_translates");
        return $back;
    }
}
