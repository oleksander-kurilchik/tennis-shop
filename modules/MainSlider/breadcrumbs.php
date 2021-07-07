<?php
$this->breadcrumbsFor('admin.main-slider.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.main-slider.index'), route('admin.main-slider.index'));
});
$this->breadcrumbsFor('admin.main-slider.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.main-slider.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.main-slider.create'), route('admin.main-slider.create'));
});
$this->breadcrumbsFor('admin.main-slider.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.main-slider.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.main-slider.edit', ['id' => $model->id, 'name' => $model->name]), route('admin.main-slider.edit', ['id' => $model->id]));
});
$this->breadcrumbsFor('admin.main-slider.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.main-slider.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.main-slider.show', ['id' => $model->id, 'name' => $model->name]), route('admin.main-slider.show', ['id' => $model->id]));
});
