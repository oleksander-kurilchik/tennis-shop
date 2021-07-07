<?php

namespace TrekSt\Modules\FrontendUsers\Models;

use Illuminate\Database\Eloquent\Model;



class SocialAccount extends Model
{


    protected $table = 'social_accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'provider_id', 'provider', 'nick_name', 'name', 'email', 'avatar', 'token', 'token_secret',
        'refresh_token','expires_in',
    ];

    public function user(){
        return $this->belongsTo(FrontendUser::class,'users_id');
    }

}
