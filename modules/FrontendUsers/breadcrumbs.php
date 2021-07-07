<?php
Breadcrumbs::for('admin.frontend_users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.frontend_users.index'), route('admin.frontend_users.index'));
});
Breadcrumbs::for('admin.frontend_users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.frontend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.frontend_users.create'), route('admin.frontend_users.create'));
});
Breadcrumbs::for('admin.frontend_users.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.frontend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.frontend_users.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.frontend_users.edit', ['id' => $model->id]));
});
Breadcrumbs::for('admin.frontend_users.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.frontend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.frontend_users.show', ['id' => $model->id, 'name' => $model->name]),
        route('admin.frontend_users.show', ['id' => $model->id]));
});
Breadcrumbs::for('admin.frontend_users.orders', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.frontend_users.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.frontend_users.orders', ['id' => $model->id, 'name' => $model->name]),
        route('admin.frontend_users.orders', ['id' => $model->id]));
});

