<?php


namespace TrekSt\Modules\Authorization\Repositories\Admin;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsRepository
{
    protected $roleModel;
    public function __construct()
    {
        $this->roleModel = new Role();
        $this->permissionModel = new Permission();

    }

    public function syncPermissions($id, $permissionsIds)
    {

        $role = $this->roleModel->newQuery()->find($id);
        $permissions = $this->permissionModel->newQuery()->whereIn('id',$permissionsIds)->get();
        $role->syncPermissions($permissions);

    }


}
