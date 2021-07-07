<?php


namespace TrekSt\Modules\FrontendUsers\Repositories\Frontend;


use Illuminate\Auth\Events\Verified;
use TrekSt\Modules\FrontendUsers\Models\FrontendUser;
use TrekSt\Modules\FrontendUsers\Models\SocialAccount;

class FrontendUsersRepository
{
    public function __construct()
    {
        $this->userModel = new FrontendUser();
        $this->socialModel = new SocialAccount();

    }



    public function get(int $id)
    {
        return $this->userModel->newQuery()->findOrFail($id);
    }

    public function find(int $id)
    {
        return $this->userModel->newQuery()->find($id);
    }
    public function findByEmail(string $email)
    {
        return $this->userModel->newQuery()->where('email',$email)->first();
    }
    public function findBySocialiteProvider(string $provider, string $providerId)
    {
        return $this->userModel->newQuery()->where('id',function ($query)use($provider,$providerId){
            $query->select('users_id')->from((new SocialAccount())->getTable())->where('provider', $provider)
                ->where('provider_id', $providerId)->limit(1);
        })->first();
    }




    public function create(array $inputs){
        if ($inputs['password'] != null) {
            $inputs['password'] = bcrypt($inputs['password']);
        }
        else{
            unset ( $inputs['password']);
        }



        $model = $this->userModel->create($inputs);

        return $model;

    }

    public function updateById($id,$inputs)
    {
        $model = $this->userModel->findOrFail($id);

        if ($inputs['password'] != null) {
            $inputs['password'] = bcrypt($inputs['password']);
        }
        else{
           unset ( $inputs['password']);
        }


        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->userModel->findOrFail($id);
        $model->delete();
        return $model;
    }

    public function createFromSocialite( $socialiteUser){
        $inputs = [
            'first_name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'password' => bcrypt($random = \Str::random(25)),
            'status' => 'active',
        ];


        $model = $this->userModel->create($inputs);
        $model ->markEmailAsVerified();
        event(new Verified($model));
        return $model;

    }






}
