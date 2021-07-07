<?php
Breadcrumbs::for('admin.backend_users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_users.index'), route('admin.backend_users.index'));
});
Breadcrumbs::for('admin.backend_users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.backend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_users.create'), route('admin.backend_users.create'));
});
Breadcrumbs::for('admin.backend_users.change_password', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.backend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_users.change_password',['id'=>$model->id,'name'=>$model->name]), route('admin.backend_users.change_password',['id'=>$model->id] ));
});
Breadcrumbs::for('admin.backend_users.show', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.backend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_users.show',['id'=>$model->id,'name'=>$model->name]), route('admin.backend_users.show',['id'=>$model->id]));
});
Breadcrumbs::for('admin.backend_users.edit', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.backend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_users.edit',['id'=>$model->id,'name'=>$model->name]),
        route('admin.backend_users.edit',['id'=>$model->id]));
});

