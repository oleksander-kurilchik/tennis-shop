<?php


namespace TrekSt\Modules\ProductsAttributes\Repositories\Admin;


use TrekSt\Modules\ProductsAttributes\Models\Admin\ProductsAttributesGroup;
use TrekSt\Modules\ProductsAttributes\Models\ProductsAttribute;

class ProductsAttributesRepository
{
    protected $model;
    protected $perPage = 25;
    protected $groupId = null;

    /**
     * @param  null  $groupId
     */
    public function setGroupId($groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * ProductsAttributesGroupsRepository constructor.
     * @param $model ProductsAttributes
     */
    public function __construct()
    {
        $this->model = new ProductsAttribute();
    }

    public function getForEdit(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function paginateIndex($keyword = null)
    {
       $query =  $this->model->query()->sortable();
       if($this->groupId){
           $query->where('group_id',$this->groupId);
       }
        if (!empty($keyword)) {
            $query->orWhere('order', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")

            ;
        }
        return $query->paginate();
    }

    public function create($inputs)
    {
        $model = $this->model->fill($inputs);
        $model->save();
        return $model;
    }
  public function updateById($id,$inputs)
    {
        $model = $this->model->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }

    public function deleteById($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return $model;
    }

    public function canDelete()
    {

    }





}
