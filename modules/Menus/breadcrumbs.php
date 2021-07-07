<?php
$this->breadcrumbsFor('admin.menus.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.menus.index'), route('admin.menus.index'));
});
$this->breadcrumbsFor('admin.menus.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.menus.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.menus.create'), route('admin.menus.create'));
});

$this->breadcrumbsFor('admin.menus.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menus.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.menus.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.menus.edit', ['id' => $model->id]));
});

$this->breadcrumbsFor('admin.menus.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menus.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.menus.show', ['id' => $model->id, 'name' => $model->name]),
        route('admin.menus.show', ['id' => $model->id]));
});






$this->breadcrumbsFor('admin.menu_item.index', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.menus.edit',$model);
    $breadcrumbs->push(trans('admin_breadcrumbs.menu_item.index'), route('admin.menu_item.index',['menu_id'=>$model->id]));
});
$this->breadcrumbsFor('admin.menu_item.create', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.menu_item.index',$model);
    $breadcrumbs->push(trans('admin_breadcrumbs.menu_item.create'), route('admin.menu_item.create',['menu_id'=>$model->id]));
});

$this->breadcrumbsFor('admin.menu_item.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.menu_item.index',$model->menu);
    $breadcrumbs->push(trans('admin_breadcrumbs.menu_item.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.menu_item.edit', ['id' => $model->id,'menu_id'=>$model->menu->id]));
});

//$this->breadcrumbsFor('admin.menus.menu_item', function ($breadcrumbs, $model) {
//    $breadcrumbs->parent('admin.menu_item.index');
//    $breadcrumbs->push(trans('admin_breadcrumbs.menus.menu_item', ['id' => $model->id, 'name' => $model->name]),
//        route('admin.menu_item.show', ['id' => $model->id]));
//});



//$this->breadcrumbsFor('admin.menus.edit-categories-hierarchy', function ($breadcrumbs) {
//    $breadcrumbs->parent('admin.menus.index');
//    $breadcrumbs->push(trans('admin_breadcrumbs.menus.edit-categories-hierarchy'),
//        route('admin.menus.edit-categories-hierarchy'));
//});
