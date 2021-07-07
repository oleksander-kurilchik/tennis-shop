<?php
Route::namespace('\TrekSt\Modules\BackendUsers\Http\Controllers')->group(function () {
        Route::group(['prefix' => 'backend_users', 'as' => 'backend_users.'], function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{id}/edit', 'AdminUsersController@edit')->name('edit');
            Route::match(['put', 'patch'], '/{id}', 'AdminUsersController@update')->name('update');
            Route::get('/{id}', 'AdminUsersController@show')->name('show');
            Route::get('/change_password/{id}', 'AdminUsersController@passwordForm')->name('change_password');
            Route::post('/change_password/{id}', 'AdminUsersController@changePassword')->name('change_password_submit');
            Route::delete('/{id}', 'AdminUsersController@destroy')->name('delete');

        });

});



