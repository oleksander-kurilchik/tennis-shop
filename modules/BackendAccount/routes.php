<?php
Route::namespace('\TrekSt\Modules\BackendAccount\Http\Controllers')->group(function () {
        Route::group(['prefix' => 'backend_account', 'as' => 'backend_account.'], function () {
            Route::get('/', 'BackendAccountController@show')->name('show');

            Route::get('/edit', 'BackendAccountController@edit')->name('edit');
            Route::match(['put', 'patch'],'/edit', 'BackendAccountController@update')->name('update');

            Route::get('/edit-password', 'BackendAccountController@editPassword')->name('edit-password');
            Route::post('/edit-password', 'BackendAccountController@updatePassword')->name('update-password');

//            Route::match(['put', 'patch'], '/{id}', 'AdminUsersController@update')->name('update');
//            Route::get('/{id}', 'AdminUsersController@show')->name('show');
//            Route::get('/change_password', 'AdminUsersController@passwordForm')->name('change_password');
//            Route::post('/change_password', 'AdminUsersController@changePassword')->name('change_password_submit');
//            Route::delete('/{id}', 'AdminUsersController@destroy')->name('delete');

        });

});



