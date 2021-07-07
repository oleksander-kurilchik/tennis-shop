<?php

namespace TrekSt\Modules\Categories\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use TrekSt\Modules\Categories\Models\CategoriesTranslating;
use Illuminate\Http\Request;
use Session;
use Validator;
use Cache;


class CategoriesTranslatingController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:categories.edit')->only(['update' ]);
    }

    public function update($id, Request $request)
    {
        $rules = array(
            'title' => ['required',"min:1","max:1000"],
            'description' => 'nullable|max:20000',
            'short_description' => 'nullable|max:1000',
            'seo_title'=>["string","nullable" ,"max:1000"],
            'seo_description'=>["string","nullable","max:1000"],
            'seo_keywords'=>["string","nullable","max:1000"],
            'seo_text'=>["string","nullable","max:20000"],);
            $validator = Validator::make($request->all(), $rules);

        $translating =  CategoriesTranslating::findOrFail($id);
        $lang = $translating->language->name;
        if ($validator->fails())
        {
            Session::flash('flash_warning', "Перевод '{$lang}' не пройшов валідацію" );
            return back()->withErrors($validator,"_translate_errors_".$id)->withInput(["_translate_old_".$id => $request->all()]);
        }
        $translating->update($request->all());
        Session::flash('flash_message', "Перевод '{$lang}'  оновлено" );
        Cache::flush();
        return back();
   }

}
