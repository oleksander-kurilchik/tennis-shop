<?php

$this->breadcrumbsFor('admin.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.categories.index'), route('admin.categories.index'));
});
$this->breadcrumbsFor('admin.categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.categories.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.categories.create'), route('admin.categories.create'));
});

$this->breadcrumbsFor('admin.categories.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.categories.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.categories.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.categories.edit', ['id' => $model->id]));
});

$this->breadcrumbsFor('admin.categories.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.categories.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.categories.show', ['id' => $model->id, 'name' => $model->name]),
        route('admin.categories.show', ['id' => $model->id]));
});


$this->breadcrumbsFor('admin.categories.edit-categories-hierarchy', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.categories.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.categories.edit-categories-hierarchy'), route('admin.categories.edit-categories-hierarchy'));
});



