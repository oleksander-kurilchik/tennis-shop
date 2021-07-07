<?php


namespace TrekSt\Modules\Authorization\Repositories\Admin;


use Spatie\Permission\Models\Role;

class RolesRepository
{
    protected $roleModel;
    public function __construct()
    {
        $this->roleModel = new Role();

    }

    public function getForEdit(int $id)
    {
        return $this->roleModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->roleModel->findOrFail($id);
    }

    public function getQuery( )
    {
        return $this->roleModel->newQuery();
    }

    public function paginateIndex( )
    {
        $query = $this->roleModel->newQuery()->orderBy('id');
        return $query->paginate();
    }
    public function all( )
    {
        $query = $this->roleModel->newQuery()->orderBy('id');
        return $query->get();
    }


    public function create(array $data){

        $data['guard_name'] = 'backend';
        $model = $this->roleModel->create($data);
        return $model;

    }

    public function updateById($id,$inputs)
    {
        $model = $this->roleModel->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->roleModel->findOrFail($id);
        $model->delete();
        return $model;
    }




}
