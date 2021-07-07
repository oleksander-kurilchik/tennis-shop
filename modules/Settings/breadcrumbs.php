<?php
Breadcrumbs::for('admin.settings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.settings.index'), route('admin.settings.index'));
});
Breadcrumbs::for('admin.settings.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.settings.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.settings.create'), route('admin.settings.create'));
});
Breadcrumbs::for('admin.settings.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.settings.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.settings.edit', ['id' => $model->id, 'name' => $model->name]), route('admin.settings.edit', ['id' => $model->id]));
});
Breadcrumbs::for('admin.settings.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.settings.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.settings.show', ['id' => $model->id, 'name' => $model->name]), route('admin.settings.show', ['id' => $model->id]));
});
