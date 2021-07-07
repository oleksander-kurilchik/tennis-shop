<?php


namespace TrekSt\Modules\FrontendUsers\Repositories\Admin;


use TrekSt\Modules\FrontendUsers\Models\FrontendUser;

class FrontendUsersRepository
{
    public function __construct()
    {
        $this->userModel = new FrontendUser();

    }


    public function getForEdit(int $id)
    {
        return $this->userModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->userModel->newQuery()->managerFilter()->findOrFail($id);
    }
    public function paginateIndex($queryCondition = [])
    {
        $query = $this->userModel->query()->managerFilter();//->sortable();
        if(isset($queryCondition['keyword'])){
            $keyword = $queryCondition['keyword'];
            $query->orWhere('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")

                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%");

        }
       return $query ->paginate();
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






}
