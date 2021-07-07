<?php

namespace TrekSt\Modules\Settings\Http\Controllers;

use DB;
use Cache;
use Session;
use Validator;
use Illuminate\Http\Request;
use TrekSt\Modules\Settings\Models\Admin\Settings;
use TrekSt\Modules\Settings\Models\Admin\SettingsGroup;
use TrekSt\Modules\Settings\Http\Requests\SettingsStoreRequest;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class SettingsController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:settings.index')->only(['index']);
        $this->middleware('permission:settings.edit')->only(['edit','update']);
        $this->middleware('permission:settings.create')->only(['create','store']);
        $this->middleware('permission:settings.delete')->only(['destroy']);
        $this->middleware('permission:settings.show')->only(['show']);


    }



    public function index(Request $request)
    {

        $settingsGroups = SettingsGroup::orderBy('order')->get();
        $settingsQuery = Settings::query()->sortable();
        $keyword = $request->get('search');
        $settingsGroupsFilter = $request->get('settingsGroups');

        if (!empty($keyword)) {
            $settingsQuery->where('name', 'LIKE', "%$keyword%")
                ->orWhere('key', 'LIKE', "%$keyword%")
                ->orWhere('value', 'LIKE', "%$keyword%")
                ->orWhere('comment', 'LIKE', "%$keyword%");
        }
        if (!empty($settingsGroupsFilter)) {
            $settingsQuery->where('settings_groups_id', $settingsGroupsFilter);
        }


        $settings = $settingsQuery->paginate(15);
        $this->setCurrentBreadcrumbs('admin.settings.index');
        return view('admin.settings.index', compact('settingsGroups', 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */


    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.settings.create');
        $settingsGroups = SettingsGroup::getForSelect();
        $inputTypes = Settings::getInputTypes();
        $this->setCurrentBreadcrumbs('admin.settings.create');
        return $this->view('admin.settings.create', compact('settingsGroups', 'inputTypes'));
    }


    public function store(SettingsStoreRequest $request)
    {
        $requestData = $request->validated();
        $settings = Settings::create($requestData);
        Cache::flush();
        Session::flash('flash_message', 'Нове наштування створено');
        return redirect(route('admin.settings.edit', ['id' => $settings->id]));
    }


    public function show($id)
    {
        $setting = Settings::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.settings.show', $setting);
        return $this->view('admin.settings.show', compact('setting'));
    }

    public function edit($id)
    {
        $setting = Settings::findOrFail($id);
        if (!$setting->canEdit()) {
            Session::flash('flash_warning', "Дане налаштування \"{$setting->name}\" не може редагуватися");
            return redirect(route('admin.settings.index'));
        }

        $this->setCurrentBreadcrumbs('admin.settings.edit', $setting);
        return $this->view('admin.settings.edit', compact('setting'));
    }


    public function update($id, Request $request)
    {
        $setting = Settings::findOrFail($id);
        $this->validate($request, ['value' => $setting->validation_rules]);
        if ($setting->canEdit()) {
            $setting->value = $request->value;
            $setting->save();
            Session::flash('flash_message', 'Налаштування оновлено!');
            Cache::flush();
            return back();
        } else {
            Session::flash('flash_warning', 'Дане налаштування не може редагуватися');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse','\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $setting = Settings::findOrFail($id);
        if ($setting->canDelete()) {
            Session::flash('flash_warning', 'Дане налаштування не може видалятися');
            return back();
        }
        $setting->delete();
        Cache::flush();
        Session::flash('flash_message', 'Налаштування видалено!');
        return redirect(route('admin.settings.index'));
    }


}
