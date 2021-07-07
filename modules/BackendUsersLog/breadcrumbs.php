<?php
Breadcrumbs::for('admin.users_login_log.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.users_login_log.index'), route('admin.backend_users_log.login.index'));
});
