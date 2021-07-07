<?php

namespace TrekSt\Modules\Feedback\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'description', 'source'];

    use Sortable;

}
