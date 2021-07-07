<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->except[] = route('admin.index').'*';
    }

    protected $except = [
        //
    ];
}
