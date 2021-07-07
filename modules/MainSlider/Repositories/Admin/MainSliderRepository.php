<?php


namespace TrekSt\Modules\MainSlider\Repositories\Admin;


use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\MainSlider\Models\MainSlider;

class MainSliderRepository
{
    protected $baseModel;
    protected $languageModel;
    public function __construct(  )
    {
        $this->baseModel = new MainSlider();
        $this->languageModel = new Language;
    }

    public function getForEdit(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }
    public function paginateIndex($keyword = null)
    {
        $query = $this->baseModel->query()->sortable();
        if (!empty($keyword)) {
            $query->orWhere('order', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
            ;
        }
        return $query->paginate();
    }


    public function create(array $data){

        $model = $this->baseModel->create($data);
        return $model;

    }

    public function updateById($id,$inputs)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->delete();
        return $model;
    }

    public function updateOrderById($id,$order)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->order = $order ;
        $model->save() ;
        return $model;
    }
    public function setSmallImage($imageName,$id){
        $model = $this->baseModel->findOrFail($id);
        $model->image_name_sm = $imageName;
        $model->save();
        return $model;

    }

    public function setImage($imageName,$id){
        $model = $this->baseModel->findOrFail($id);
        $model->image_name = $imageName;
        $model->save();
        return $model;
    }


}
