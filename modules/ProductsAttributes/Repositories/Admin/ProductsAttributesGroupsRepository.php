<?php


namespace TrekSt\Modules\ProductsAttributes\Repositories\Admin;
use TrekSt\Modules\ProductsAttributes\Models\ProductsAttributesGroup;

class ProductsAttributesGroupsRepository
{
    protected $model;
    protected $perPage = 25;

    /**
     * ProductsAttributesGroupsRepository constructor.
     * @param $model ProductsAttributesGroup
     */
    public function __construct()
    {
        $this->model = new ProductsAttributesGroup();
    }

    public function getForEdit(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->model->findOrFail($id);
    }
    public function paginateIndex($keyword = null)
    {
        $query = $this->model->query()->sortable();
        if (!empty($keyword)) {
            $query->orWhere('order', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%");
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
