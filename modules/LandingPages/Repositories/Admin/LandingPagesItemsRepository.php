<?php


namespace TrekSt\Modules\News\Repositories\Admin;


class LandingPagesItemsRepository
{
    protected $baseModel;
    public function __construct($baseModel,$languageModel )
    {
        $this->baseModel = $baseModel;
        $this->languageModel = $languageModel;

    }

    public function getForEdit(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }


    public function create(array $data){

        $model = $this->baseModel->create($data);
        switch ($model->type){
            case 'parallax_json':{
                $model->value = '{"image_src":""
                ,"title":"",
                "description":" ",
                "aligment":"right","width":"100",
                "enable_button":false,"button_text":"",
                "button_url":"","parallax_speed":0,"parallax_direction":"up"}';
            }break;
            case 'slider_json':{
                $model->value = '{"slides":[ ],"type":"slide"}';
            }break;
        }
        $model->save();


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

//    public function updateOrderById($id,$order)
//    {
//        $model = $this->model->findOrFail($id);
//        $model->order = $order ;
//        $model->save() ;
//        return $model;
//    }



}
