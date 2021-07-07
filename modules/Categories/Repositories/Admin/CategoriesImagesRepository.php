<?php


namespace TrekSt\Modules\Categories\Repositories\Admin;


use TrekSt\Modules\Categories\Models\CategoriesImage;

class CategoriesImagesRepository
{
    protected $imageModel;

    public function __construct( )
    {

        $this->imageModel = new CategoriesImage;

    }

    public function create($data)
    {

        $imageModel = $this->imageModel->newInstance($data);
        $imageModel->save();
        return $imageModel;

    }
    public function deleteById($id)
    {
        $imageModel = $this->imageModel->newQuery()->findOrFail($id);
        $imageModel->delete();
        return $imageModel;
    }
    public function deleteByCategory($categories_id)
    {
          $this->imageModel->newQuery()->where('categories_id')->delete();
    }

    public function getAllForCategory($categories_id)
    {
      return $this->imageModel->newQuery()->where('categories_id')->get();
    }



    public function setAsLogo($id)
    {
        $news = $this->imageModel->newQuery()->findOrFail($id);
        $this->imageModel->newQuery()->where('categories_id', $news->cagegories_id)->update(['logo_status' => false]);
        $news->update(['logo_status' => true]);
        return $news;
    }
}
