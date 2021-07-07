<?php


namespace TrekSt\Modules\Authorization\Repositories\Admin;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsRepository
{
    protected $permissionModel;
    public function __construct()
    {
        $this->permissionModel = new Permission();

    }

    public function getForEdit(int $id)
    {
        return $this->permissionModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->permissionModel->findOrFail($id);
    }
    public function paginateIndex( )
    {
        $query = $this->permissionModel->newQuery()->orderBy('id');

        return $query->paginate();
    }

    public function all( )
    {
        $query = $this->permissionModel->newQuery()->orderBy('id');
        return $query->get();
    }



    public function create(array $data){

        $data['guard_name'] = 'backend';
        $model = $this->permissionModel->create($data);
        return $model;

    }

    public function updateById($id,$inputs)
    {
        $model = $this->permissionModel->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->permissionModel->findOrFail($id);
        $model->delete();
        return $model;
    }




}
