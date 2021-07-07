<?php


namespace TrekSt\Modules\ProductsVariations\Repositories\Admin;


 use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroup;
 use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroupsItem;

 class ProductsVariationsItemsRepository
{
    protected $model;
    protected $perPage = 25;

    /**
     * ProductsAttributesGroupsRepository constructor.
     * @param $model ProductsVariationsGroup
     */
    public function __construct( )
    {

        $this->itemsModel = new ProductsVariationsGroupsItem();
        $this->groupModel = new ProductsVariationsGroup();
    }

    public function getForEdit(int $id)
    {
        return $this->itemsModel->findOrFail($id);
    }
//
//    public function get(int $id)
//    {
//        return $this->model->findOrFail($id);
//    }
    public function getForIndex($groupID )
    {
        $query = $this->itemsModel->query()->where('groups_id',$groupID)->sortable();
        return $query->get();
    }
//
    public function create($inputs)
    {
        $model = $this->itemsModel->create($inputs);
        $model->save();
        return $model;
    }
  public function updateById($id,$inputs)
    {
        $model = $this->itemsModel->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
//
    public function deleteById($id)
    {
        $model = $this->itemsModel->findOrFail($id);
        $model->delete();
        return $model;
    }

}
