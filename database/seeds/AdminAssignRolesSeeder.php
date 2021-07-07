<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminAssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
       // $superAdmin =   Role::query()->where( ['name' => 'super-admin','guard_name'=>'backend'])->first();
        $user = \TrekSt\Modules\BackendUsers\Models\BackendUser::query()->find(1);

        $user->assignRole('super-admin' );






    }
}
