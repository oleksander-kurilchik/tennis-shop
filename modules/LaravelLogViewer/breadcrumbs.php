<?php
Breadcrumbs::for('admin.laravel_log_viewer.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.laravel_log_viewer.index'), route('admin.laravel_log_viewer.index'));
});
