<?php

namespace TrekSt\Modules\FrontendUsers\Models;

use Illuminate\Database\Eloquent\Model;

class FrontendUsersMessage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'frontend_users_messages';
    protected $fillable = [
        'users_id','managers_id','message','source','lang','read_at'
    ];


}
