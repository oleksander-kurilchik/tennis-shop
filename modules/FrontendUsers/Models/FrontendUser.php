<?php

namespace TrekSt\Modules\FrontendUsers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use TrekSt\Modules\FrontendUsers\Notifications\Frontend\ResetPassword;
use TrekSt\Modules\FrontendUsers\Notifications\Frontend\VerifyEmail;
use TrekSt\Modules\Regions\Models\Country;
use TrekSt\Modules\Regions\Models\Region;

class FrontendUser extends Authenticatable implements  MustVerifyEmail
{
    use Notifiable;
    protected $guard = 'frontend';
//'inactive','active','blocked','banned'

    public const  INACTIVE = 'inactive';
    public const  ACTIVE = 'active';
    public const  BLOCKED = 'blocked';
    public const  BANNED = 'banned';

    protected $table = 'frontend_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'patronymic','phone','countries_id','regions_id','city','company','stores_number',
        'address','email', 'email_verified_at','password','status' ];





    public function sendEmailVerificationNotification()
    {
        $this->notify(new  VerifyEmail() );
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }



    public function messages(){
      return  $this->hasMany(FrontendUsersMessage::class,'users_id');
    }


    public function accounts(){
        return  $this->hasMany(SocialAccount::class,'users_id');
    }



    public function isInActive() {
        return $this->status == self::INACTIVE;
    }
    public function isBlocked(){
        return $this->status == self::BLOCKED;
    }

    public function isActive(){
        return $this->status == self::ACTIVE;
    }


    public function scopeManagerFilter($query){
      /*  $user = \Auth::guard('backend')->user();
        if(!$user->super_user){
            $query->whereIn('frontend_users.id',function ($query)use ($user){
                $query->select(\DB::raw("frontend_users.id from frontend_users WHERE frontend_users.regions_id in
                                                   (SELECT regions_id FROM `backend_users_regions_pivot` WHERE backend_users_regions_pivot.users_id = {$user->id}) "));

            });

        }
        return $query;*/
    }

}
