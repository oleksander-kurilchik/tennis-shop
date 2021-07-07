<?php


namespace TrekSt\Modules\News\Repositories\Admin;


use TrekSt\Modules\LandingPages\Models\LandingPageHeaderImage;

class LandingPagesImagesRepository
{
    protected $imageModel;

    public function __construct( $imageModel)
    {

        $this->imageModel = $imageModel;

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


    public function setAsLogo($id)
    {
        $news = $this->imageModel->newQuery()->findOrFail($id);
        $this->imageModel->newQuery()->where('news_id', $news->news_id)->update(['logo_status' => false]);
        $news->update(['logo_status' => true]);
        return $news;
    }
}
