<?php

namespace TrekSt\Modules\ArtisanCommands\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Storage;

class ArtisanCommand extends Model
{
    use Sortable;
    protected $table = 'admin_artisan_commands_table';




}
