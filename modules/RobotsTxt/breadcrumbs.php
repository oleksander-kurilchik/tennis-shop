<?php
Breadcrumbs::for('admin.robots_txt.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.robots_txt.edit'), route('admin.edit_robots_txt.update'));
});
