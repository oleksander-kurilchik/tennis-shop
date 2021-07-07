<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUsersRolesTableSeeder extends Seeder
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
        $superAdmin =   Role::create(['name' => 'super-admin','guard_name'=>'backend']);
        $admin =        Role::create(['name' => 'admin','guard_name'=>'backend']      );
        $writer =       Role::create(['name' => 'writer','guard_name'=>'backend']     );
        $manager =      Role::create(['name' => 'manager','guard_name'=>'backend']    );
        $moderator =    Role::create(['name' => 'moderator','guard_name'=>'backend']    );

        /////////////////////////////////////////////////

        //
        Permission::create(['name' => 'backend_users.index','guard_name'=>'backend']);
        Permission::create(['name' => 'backend_users.create','guard_name'=>'backend']);
        Permission::create(['name' => 'backend_users.update','guard_name'=>'backend']);
        Permission::create(['name' => 'backend_users.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'backend_users.show','guard_name'=>'backend']);


        //
        Permission::create(['name' => 'settings.index','guard_name'=>'backend']);
        Permission::create(['name' => 'settings.create','guard_name'=>'backend']);
        Permission::create(['name' => 'settings.update','guard_name'=>'backend']);
        Permission::create(['name' => 'settings.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'settings.show','guard_name'=>'backend']);


        Permission::create(['name' => 'cache_clear.clear','guard_name'=>'backend']);


        Permission::create(['name' => 'maintenance_mode.show','guard_name'=>'backend']);
        Permission::create(['name' => 'maintenance_mode.update','guard_name'=>'backend']);



        Permission::create(['name' => 'artisan.index','guard_name'=>'backend']);
        Permission::create(['name' => 'artisan.create','guard_name'=>'backend']);
        Permission::create(['name' => 'artisan.update','guard_name'=>'backend']);
        Permission::create(['name' => 'artisan.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'artisan.show','guard_name'=>'backend']);
        Permission::create(['name' => 'artisan.run','guard_name'=>'backend']);



/////////////////////////////////////////////////
        //pages
        Permission::create(['name' => 'pages.index','guard_name'=>'backend']);
        Permission::create(['name' => 'pages.create','guard_name'=>'backend']);
        Permission::create(['name' => 'pages.update','guard_name'=>'backend']);
        Permission::create(['name' => 'pages.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'pages.show','guard_name'=>'backend']);



        Permission::create(['name' => 'news.index','guard_name'=>'backend']);
        Permission::create(['name' => 'news.create','guard_name'=>'backend']);
        Permission::create(['name' => 'news.update','guard_name'=>'backend']);
        Permission::create(['name' => 'news.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'news.show','guard_name'=>'backend']);




        Permission::create(['name' => 'categories.index','guard_name'=>'backend']);
        Permission::create(['name' => 'categories.create','guard_name'=>'backend']);
        Permission::create(['name' => 'categories.update','guard_name'=>'backend']);
        Permission::create(['name' => 'categories.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'categories.show','guard_name'=>'backend']);





        Permission::create(['name' => 'products.index','guard_name'=>'backend']);
        Permission::create(['name' => 'products.create','guard_name'=>'backend']);
        Permission::create(['name' => 'products.update','guard_name'=>'backend']);
        Permission::create(['name' => 'products.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'products.show','guard_name'=>'backend']);




        Permission::create(['name' => 'menus.index','guard_name'=>'backend']);
        Permission::create(['name' => 'menus.create','guard_name'=>'backend']);
        Permission::create(['name' => 'menus.update','guard_name'=>'backend']);
        Permission::create(['name' => 'menus.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'menus.show','guard_name'=>'backend']);



        Permission::create(['name' => 'backend_users_log.index','guard_name'=>'backend']);


        Permission::create(['name' => 'laravel_log_viewer.index','guard_name'=>'backend']);
        Permission::create(['name' => 'laravel_log_viewer.download','guard_name'=>'backend']);



        Permission::create(['name' => 'downloaded_files.index','guard_name'=>'backend']);
        Permission::create(['name' => 'downloaded_files.create','guard_name'=>'backend']);
        Permission::create(['name' => 'downloaded_files.update','guard_name'=>'backend']);
        Permission::create(['name' => 'downloaded_files.delete','guard_name'=>'backend']);
        Permission::create(['name' => 'downloaded_files.show','guard_name'=>'backend']);


        Permission::create(['name' => 'file_manager.show','guard_name'=>'backend']);
        Permission::create(['name' => 'file_manager.update','guard_name'=>'backend']);



        Permission::create(['name' => 'filters.index', 'guard_name'=>'backend']);
        Permission::create(['name' => 'filters.create', 'guard_name'=>'backend']);
        Permission::create(['name' => 'filters.update', 'guard_name'=>'backend']);
        Permission::create(['name' => 'filters.delete', 'guard_name'=>'backend']);
        Permission::create(['name' => 'filters.show', 'guard_name'=>'backend']);





        $adminPermitions = Permission::query()->get();
        $admin->givePermissionTo($adminPermitions);
        $superAdmin->givePermissionTo($adminPermitions);





    }
}
