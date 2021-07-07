<?php


Breadcrumbs::for('admin.roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.roles.index'), route('admin.roles.index'));
});
Breadcrumbs::for('admin.roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.roles.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.roles.create'), route('admin.roles.create'));
});
Breadcrumbs::for('admin.roles.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.roles.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.roles.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.roles.edit', ['id' => $model->id]));
});
Breadcrumbs::for('admin.roles.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.roles.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.roles.show', ['id' => $model->id, 'name' => $model->name]),
        route('admin.roles.show', ['id' => $model->id]));
});

Breadcrumbs::for('admin.roles_permissions.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.roles.edit',$model);
    $breadcrumbs->push(trans('admin_breadcrumbs.roles_permissions.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.roles_permissions.index', ['roles_id' => $model->id]));
});




Breadcrumbs::for('admin.permissions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.permissions.index'), route('admin.permissions.index'));
});
Breadcrumbs::for('admin.permissions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.permissions.create'), route('admin.permissions.create'));
});
Breadcrumbs::for('admin.permissions.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.permissions.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.permissions.edit', ['id' => $model->id]));
});
Breadcrumbs::for('admin.permissions.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.permissions.show', ['id' => $model->id, 'name' => $model->name]),
        route('admin.permissions.show', ['id' => $model->id]));
});



Breadcrumbs::for('admin.users_roles.edit', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.backend_users.edit',$model);
    $breadcrumbs->push(trans('admin_breadcrumbs.users_roles.edit', ['id' => $model->id, 'name' => $model->name]),
        route('admin.users_roles.index', ['users_id' => $model->id]));
});

