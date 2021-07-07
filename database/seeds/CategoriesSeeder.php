<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $rawCategories   = factory(\TrekSt\Modules\Categories\Models\Category::class, 8)->raw();
         $debug = 0 ;
         $categoryRepositories = new \TrekSt\Modules\Categories\Repositories\Admin\CategoriesRepository();
         foreach ($rawCategories as $rawCategory){
             $category =  $categoryRepositories->create($rawCategory);
             $rawSubCategories   = factory(\TrekSt\Modules\Categories\Models\Category::class, 8)->raw();
             foreach ($rawSubCategories as $rawSubCategory){
                 $rawSubCategory['parent_id'] = $category->id;
                 $subCategory =  $categoryRepositories->create($rawSubCategory);
             }
         }

    }
}
