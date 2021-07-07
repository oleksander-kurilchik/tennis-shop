<?php

use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filterRepository = new \TrekSt\Modules\Filters\Repositories\Admin\FiltersRepository();
        $filterValueRepository = new \TrekSt\Modules\Filters\Repositories\Admin\FiltersValuesRepository();
        $rawFilters   = factory(\TrekSt\Modules\Filters\Models\Filter::class, 30)->raw();
        $rawFiltersValueChunk   =  collect(factory(\TrekSt\Modules\Filters\Models\FiltersValue::class, 450)->raw())->chunk(15);
        foreach ($rawFilters as $key => $rawFilter){
          $filter = $filterRepository->create($rawFilter);
          foreach ($rawFiltersValueChunk[$key] as $group){
              $group['filters_id'] =  $filter->id;
              $filterValueRepository->create($group);
          }
        }
    }
}
