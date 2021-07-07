<?php
Breadcrumbs::for('admin.backend_account.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_account.show' ), route('admin.backend_account.show' ));
});
Breadcrumbs::for('admin.backend_account.change_password', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.backend_account.show');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_account.change_password' ), route('admin.backend_account.edit-password'  ));
});

Breadcrumbs::for('admin.backend_account.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.backend_account.show');
    $breadcrumbs->push(trans('admin_breadcrumbs.backend_account.edit' ),
        route('admin.backend_account.edit' ));
});
