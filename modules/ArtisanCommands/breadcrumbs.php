<?php
Breadcrumbs::for('admin.artisan_commands.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.artisan_commands.index'), route('admin.artisan_commands.index'));
});

Breadcrumbs::for('admin.artisan_commands.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.artisan_commands.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.artisan_commands.show',
        ['id' => $model->id, 'name' => $model->name]), route('admin.artisan_commands.show', ['id' => $model->id]));
});
