<?php

Route::namespace('\TrekSt\Modules\Authorization\Http\Controllers')->group(function () {

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', 'RolesController@index')->name('index');
        Route::get('/create', 'RolesController@create')->name('create');
        Route::post('/', 'RolesController@store')->name('store');
        Route::get('/{id}', 'RolesController@show')->name('show');
        Route::get('/{id}/edit', 'RolesController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'RolesController@update')->name('update');;
        Route::delete('/{id}', 'RolesController@destroy')->name('delete');

    });


    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::get('/', 'PermissionsController@index')->name('index');
        Route::get('/create', 'PermissionsController@create')->name('create');
        Route::post('/', 'PermissionsController@store')->name('store');
        Route::get('/{id}', 'PermissionsController@show')->name('show');
        Route::get('/{id}/edit', 'PermissionsController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'PermissionsController@update')->name('update');;
        Route::delete('/{id}', 'PermissionsController@destroy')->name('delete');

    });


    Route::group(['prefix' => 'roles_permissions/{roles_id}/', 'as' => 'roles_permissions.'], function () {
        Route::get('/', 'RolesPermissionsController@index')->where('roles_id', '[0-9]+')->name('index');
        Route::post('/', 'RolesPermissionsController@update')->where('roles_id', '[0-9]+')->name('update');
    });

    Route::group(['prefix' => 'users_roles/{users_id}/', 'as' => 'users_roles.'], function () {
        Route::get('/', 'UsersRolesController@index')->where('users_id', '[0-9]+')->name('index');
        Route::post('/', 'UsersRolesController@update')->where('users_id', '[0-9]+')->name('update');
    });




});





