<?php


namespace TrekSt\Modules\ProductsVariations\Repositories\Admin;


 use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroup;

 class ProductsVariationsGroupsRepository
{
    protected $model;
    protected $perPage = 25;


    public function __construct()
    {
        $this->model = new ProductsVariationsGroup;
    }

    public function getForEdit(int $id)
    {
        return $this->model->findOrFail($id);
    }
//
//    public function get(int $id)
//    {
//        return $this->model->findOrFail($id);
//    }
//    public function paginateIndex($keyword = null)
//    {
//        $query = $this->model->query()->sortable();
//        if (!empty($keyword)) {
//            $query->orWhere('order', 'LIKE', "%$keyword%")
//                ->orWhere('name', 'LIKE', "%$keyword%");
//        }
//        return $query->paginate();
//    }
//
    public function create($inputs)
    {
        $model = $this->model->create($inputs);
        $model->save();
        return $model;
    }
  public function updateById($id,$inputs)
    {
        $model = $this->model->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
//
    public function deleteById($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return $model;
    }

    public function getGroupsForProduct($products_id){

        $groups =  $this->model->where('products_id',$products_id)->get();
        $groups->load(['items.product']);

        return $groups;
    }






}
