<?php
Breadcrumbs::for('admin.file_manager.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.file_manager.index'), route('admin.file_manager.index'));
});
