<?php
$this->breadcrumbsFor('admin.orders.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.orders.index'), route('admin.orders.index'));
});
$this->breadcrumbsFor('admin.orders.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.orders.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.orders.create'), route('admin.orders.create_new_order'));
});
$this->breadcrumbsFor('admin.orders.edit', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.orders.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.orders.edit',['id'=>$model->id,'name'=>$model->name]), route('admin.orders.edit',['id'=>$model->id]));
});
$this->breadcrumbsFor('admin.orders.show', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.orders.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.orders.show',['id'=>$model->id,'name'=>$model->name]), route('admin.orders.show',['id'=>$model->id]));
});




$this->breadcrumbsFor('admin.orders_delivery.edit', function ($breadcrumbs,$order) {
    $breadcrumbs->parent('admin.orders.edit',$order);
    $breadcrumbs->push(trans('admin_breadcrumbs.orders_delivery.edit',['id'=>$order->id,'name'=>$order->name]), '');
});



$this->breadcrumbsFor('admin.orders_services.create', function ($breadcrumbs,$order) {
    $breadcrumbs->parent('admin.orders.edit',$order);
    $breadcrumbs->push(trans('admin_breadcrumbs.orders_services.create'), route('admin.orders_services.create',['orders_id'=>$order->id]));
});

$this->breadcrumbsFor('admin.orders_services.edit', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.orders.edit',$model->order);
    $breadcrumbs->push(trans('admin_breadcrumbs.orders_services.edit',['id'=>$model->id,'name'=>$model->name]), route('admin.orders_services.edit',['orders_id'=>$model->order->id, 'id'=>$model->id]));
});
