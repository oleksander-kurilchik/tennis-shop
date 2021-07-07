<?php
namespace TrekSt\Modules\FileManager\Http\Controllers;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;

use App\Http\Requests;
 use Illuminate\Http\Request;


class FileManagerController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:file_manager.index')->only(['index']);

    }

    public function index(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.file_manager.index');
        return $this->view('admin.file_manager.index' );
    }





}
