<?php
Breadcrumbs::for('admin.landing_pages.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.landing_pages.index'), route('admin.landing_pages.index'));
});
Breadcrumbs::for('admin.landing_pages.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.landing_pages.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.landing_pages.create'), route('admin.landing_pages.create'));
});
Breadcrumbs::for('admin.landing_pages.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.landing_pages.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.landing_pages.edit',
        ['id' => $model->id, 'name' => $model->name]), route('admin.landing_pages.edit', ['id' => $model->id]));
});
Breadcrumbs::for('admin.landing_pages.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.landing_pages.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.landing_pages.show',
        ['id' => $model->id, 'name' => $model->name]), route('admin.landing_pages.show', ['id' => $model->id]));
});
