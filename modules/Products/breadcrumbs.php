<?php
Breadcrumbs::for('admin.products.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.products.index'), route('admin.products.index'));
});
Breadcrumbs::for('admin.products.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.products.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.products.create'), route('admin.products.create'));
});
Breadcrumbs::for('admin.products.edit', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.products.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.products.edit',['id'=>$model->id,'name'=>$model->name]), route('admin.products.edit',['id'=>$model->id]));
});
Breadcrumbs::for('admin.products.show', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.products.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.products.show',['id'=>$model->id,'name'=>$model->name]), route('admin.products.show',['id'=>$model->id]));
});

