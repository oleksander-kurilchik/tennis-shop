<?php
Breadcrumbs::for('admin.downloaded_files.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.downloaded_files.index'), route('admin.downloaded_files.index'));
});
Breadcrumbs::for('admin.downloaded_files.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.downloaded_files.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.downloaded_files.create'), route('admin.downloaded_files.create'));
});
Breadcrumbs::for('admin.downloaded_files.edit', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.downloaded_files.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.downloaded_files.edit',['id'=>$model->id,'name'=>$model->name]), route('admin.downloaded_files.edit',['id'=>$model->id]));
});
Breadcrumbs::for('admin.downloaded_files.show', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.downloaded_files.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.downloaded_files.show',['id'=>$model->id,'name'=>$model->name]), route('admin.downloaded_files.show',['id'=>$model->id]));
});
