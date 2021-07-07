<?php
Breadcrumbs::for('admin.filters.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.filters.index'), route('admin.filters.index'));
});
Breadcrumbs::for('admin.filters.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.filters.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.filters.create'), route('admin.filters.create'));
});
Breadcrumbs::for('admin.filters.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.filters.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.filters.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.filters.edit', ['id' => $model->id]));
});
Breadcrumbs::for('admin.filters.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.filters.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.filters.show', ['id' => $model->id, 'name' => $model->name]),
        route('admin.filters.show', ['id' => $model->id]));
});


Breadcrumbs::for('admin.filters_values.index', function ($breadcrumbs, $filter) {
    $breadcrumbs->parent('admin.filters.edit', $filter);
    $breadcrumbs->push(trans('admin_breadcrumbs.filters_values.index'),
        route('admin.filters_values.index', ['filters_id' => $filter->id]));
});
Breadcrumbs::for('admin.filters_values.create', function ($breadcrumbs, $filter) {
    $breadcrumbs->parent('admin.filters_values.index', $filter);
    $breadcrumbs->push(trans('admin_breadcrumbs.filters_values.create'),
        route('admin.filters_values.create', ['filters_id' => $filter->id]));
});
Breadcrumbs::for('admin.filters_values.edit', function ($breadcrumbs, $filters_value) {
    $breadcrumbs->parent('admin.filters_values.index', $filters_value->filter);
    $breadcrumbs->push(trans('admin_breadcrumbs.filters_values.edit',
        ['id' => $filters_value->id, 'name' => $filters_value->name]),
        route('admin.filters_values.edit', ['filters_id' => $filters_value->filters_id, 'id' => $filters_value->id]));
});
Breadcrumbs::for('admin.filters_values.show', function ($breadcrumbs, $filters_value) {
    $breadcrumbs->parent('admin.filters_values.index', $filters_value->filter);
    $breadcrumbs->push(trans('admin_breadcrumbs.filters_values.show',
        ['id' => $filters_value->id, 'name' => $filters_value->name]),
        route('admin.filters_values.show', ['filters_id' => $filters_value->filters_id, 'id' => $filters_value->id]));
});

Breadcrumbs::for('admin.products_filters.index', function ($breadcrumbs,$model) {
    $breadcrumbs->parent('admin.products.edit',$model);
    $breadcrumbs->push(trans('admin_breadcrumbs.products.filter',['id'=>$model->id,'name'=>$model->name]),
        route('admin.products_filters.index',['products_id'=>$model->id]));
});
