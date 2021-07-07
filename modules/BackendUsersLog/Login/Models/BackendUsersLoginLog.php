<?php

namespace TrekSt\Modules\BackendUsersLog\Login\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BackendUsersLoginLog extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'backend_users_login_log';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ["users_id","users_name","users_email","ip","login_time"];

}
