<?php


namespace TrekSt\Modules\FrontendUsers\Repositories\Frontend;


use TrekSt\Modules\FrontendUsers\Models\FrontendUser;
use TrekSt\Modules\FrontendUsers\Models\SocialAccount;

class SocialAccountRepository
{
    public function __construct()
    {
         $this->accountModel = new SocialAccount();

    }



    public function get(int $id)
    {
        return $this->accountModel->newQuery()->findOrFail($id);
    }


    public function create(array $inputs){
       $model = $this->accountModel->create($inputs);
       return $model;
    }

    public function updateById($id,$inputs)
    {
        $model = $this->accountModel->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->accountModel->findOrFail($id);
        $model->delete();
        return $model;
    }






}
