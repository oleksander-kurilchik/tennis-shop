<?php

namespace TrekSt\Modules\DownloadedFiles\Http\Controllers;

use App\Http\Requests;
use TrekSt\Modules\DownloadedFiles\Models\DownloadedFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Validator;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;

class DownloadedFilesController extends  AdminBaseController
{
    public function __construct()
    {
        parent::__construct();


        $this->middleware('permission:download_files.index')->only(['index']);
        $this->middleware('permission:download_files.create')->only(['create','store']);
        $this->middleware('permission:download_files.show')->only(['show']);
        $this->middleware('permission:download_files.edit')->only(['edit','update']);
        $this->middleware('permission:download_files.destroy')->only(['destroy']);

    }



    protected function rules()
    {

        return [
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:3|max:2000',

            "file" => ["file", "min:1", "max:10000"],

        ];
    }


    public function index(Request $request)
    {

        $this->setCurrentBreadcrumbs('admin.downloaded_files.index');
        $keyword = $request->get('search');
        $perPage = 25;
        $files = DownloadedFiles::query()->sortable();
        if (!empty($keyword)) {
            $files = DownloadedFiles::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('file_name', 'LIKE', "%$keyword%");
        }
        $files = $files->orderBy('id')->paginate($perPage);
        return $this->view('admin.downloaded_files.index', compact('files'));
    }


    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.downloaded_files.create');
        return $this->view('admin.downloaded_files.create');
    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $rules["file"][] = "required";
        $this->validate($request, $rules);

        $requestData = $request->all();
        $file = new DownloadedFiles($requestData);
        if (isset($requestData["file"])) {
            $file->addFile($request->file("file"), $request->name);
        }
        $file->save();
        Session::flash('flash_message', 'Файл додано');
        return redirect(route("admin.downloaded_files.edit", ['id' => $file->id]));
    }

    public function storeCKEditor(Request $request)
    {
        $funcNum = $request->input('CKEditorFuncNum');
        $validator = Validator::make($request->all(), ["upload" => ["required"]]);

        if ($validator->fails()) {
            return response(
                "<script>
                window.parent.CKEDITOR.tools.callFunction({$funcNum}, '', '{$validator->errors()->first()}');
            </script>"
            );
        }
        $requestData = $request->all();
        $file = new DownloadedFiles($requestData);
        if (isset($requestData["upload"])) {
            $file->addFile($request->file("upload"), md5(time()));
        }
        $file->name = $request->file("upload")->getClientOriginalName();
        $file->description = "Завантажено через CKEditor";
        $file->save();


        $url = $file->url;
        return ["uploaded" => 1, "fileName" => $file->name, "url" => $url];

        return response(
            "<script>
            window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', 'Изображение успешно загружено');
        </script>"
        );
    }


    public function show($id)
    {
        $file = DownloadedFiles::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.downloaded_files.show',$file);
        return $this->view('admin.downloaded_files.show', compact('file'));
    }


    public function edit($id)
    {
        $file = DownloadedFiles::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.downloaded_files.edit',$file);
        return $this->view('admin.downloaded_files.edit', compact('file'));
    }


    public function update($id, Request $request)
    {
        $rules = $this->rules();

        $this->validate($request, $rules);
        $requestData = $request->all();
        $files = DownloadedFiles::findOrFail($id);
        $files->update($requestData);
        if (isset($requestData["file"])) {

            $files->updateFile($request->file("file"));
            $files->save();
        }
        Session::flash('flash_message', 'Завантаження оновлено!');
        return back();

    }

    public function destroy($id)
    {
        DownloadedFiles::findOrFail($id)->delete();
        Session::flash('flash_message', 'Завантаження видалено!');
        return redirect(route("admin.downloaded_files.index"));
    }
}
