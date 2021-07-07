<?php
Breadcrumbs::for('admin.maintenance_mode.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.maintenance_mode.index'), route('admin.maintenance_mode.index'));
});
