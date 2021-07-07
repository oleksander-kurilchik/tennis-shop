<?php
Breadcrumbs::for('admin.feedback.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.feedback.index'), route('admin.feedback.index'));
});
Breadcrumbs::for('admin.feedback.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('admin.feedback.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.feedback.show',
        ['id' => $model->id, 'name' => $model->name]), route('admin.feedback.show', ['id' => $model->id]));
});

