<?php

namespace App\Http\Requests\Frontend\Account\EmailVerification;

use Illuminate\Http\Request as Base;

class Request extends Base
{


    public function user($guard = 'frontend')
    {
        return call_user_func($this->getUserResolver(), $guard);
    }



}
