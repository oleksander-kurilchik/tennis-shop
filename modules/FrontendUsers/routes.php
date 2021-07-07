<?php

Route::namespace('\TrekSt\Modules\FrontendUsers\Http\Controllers')->group(function () {



    Route::group(['prefix' => 'frontend_users', 'as' => 'frontend_users.'], function () {
        Route::get('/', 'FrontendUsersController@index')->name('index');
        Route::get('/create', 'FrontendUsersController@create')->name('create');
        Route::post('/', 'FrontendUsersController@store')->name('store');
        Route::get('/{id}', 'FrontendUsersController@show')->name('show');
        Route::get('/{id}/edit', 'FrontendUsersController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'FrontendUsersController@update')->name('update');
        Route::delete('/{id}', 'FrontendUsersController@destroy')->name('delete');
        Route::get('/orders/{id}', 'FrontendUsersOrdersController@index')->name('orders');

    });


});











