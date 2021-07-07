<?php

namespace TrekSt\Modules\ArtisanCommands\Http\Controllers;

use TrekSt\Modules\ArtisanCommands\Models\ArtisanCommand;
use Illuminate\Http\Request;
use Artisan;
use Session;
use Breadcrumbs;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class ArtisanCommandsController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();


        $this->middleware('permission:artisan.index')->only('index');
        $this->middleware('permission:artisan.execute')->only('create','execute');
        $this->middleware('permission:artisan.show')->only('show');
//        $this->middleware('permission:artisan.edit')->only('edit','update');
//        $this->middleware('permission:artisan.destroy')->only('destroy');


    }


    public function index(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.artisan_commands.index');
        $perPage = 15;
        $commandsQuery = ArtisanCommand::query()->sortable();
                $commands = $commandsQuery->orderByDesc('order')->paginate($perPage);
        return $this->view('admin.artisan_commands.index', compact('commands'));
    }

    public function show($id)
    {
        $command = ArtisanCommand::findOrFail($id);

        $this->setCurrentBreadcrumbs('admin.artisan_commands.show',$command);
        return $this->view('admin.artisan_commands.show', compact('command'));
    }

    public function execute($id, Request $request)
    {
        $command = ArtisanCommand::findOrFail($id);
        Artisan::call($command->command);
        $artisanOutput = Artisan::output();

        Session::flash('flash_message', 'Команду artisan '.$command->command.' виконано');
        Session::flash('flash_artisan_output', $artisanOutput);
        return back();
    }





}
