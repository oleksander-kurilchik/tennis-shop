<?php

Route::namespace('\TrekSt\Modules\ProductsAttributes\Http\Controllers\Admin')->prefix('products_attributes')
    ->name('products_attributes.')
    ->group(function () {
        Route::group(['prefix' => 'groups', 'as' => 'groups.'], function () {
            Route::get('/', 'ProductsAttributesGroupsController@index')->name('index');
            Route::get('/create', 'ProductsAttributesGroupsController@create')->name('create');
            Route::post('/', 'ProductsAttributesGroupsController@store')->name('store');
            Route::get('/{id}', 'ProductsAttributesGroupsController@show')->where('id', '[0-9]+')->name('show');
            Route::get('/{id}/edit', 'ProductsAttributesGroupsController@edit')->where('id', '[0-9]+')->name('edit');
            Route::match(['put', 'patch'], '/{id}/', 'ProductsAttributesGroupsController@update')->name('update');
            Route::delete('/{id}', 'ProductsAttributesGroupsController@destroy')->name('delete');
        });



        Route::group(['prefix' => 'attributes', 'as' => 'attributes.'], function () {
            Route::get('/{group_id}/', 'ProductsAttributesController@index')->name('index')->where(['group_id' => '[0-9]+']);
            Route::get('/{group_id}/create', 'ProductsAttributesController@create')->name('create')->where(['group_id' => '[0-9]+']);
            Route::post('/{group_id}/', 'ProductsAttributesController@store')->name('store')->where(['group_id' => '[0-9]+']);


            Route::get('/attribute/{id}', 'ProductsAttributesController@show')->where('id', '[0-9]+')->name('show');
            Route::get('/attribute/{id}/edit', 'ProductsAttributesController@edit')->where('id', '[0-9]+')->name('edit');
            Route::match(['put', 'patch'], '/attribute/{id}/', 'ProductsAttributesController@update')->name('update');
            Route::delete('/attribute/{id}', 'ProductsAttributesController@destroy')->name('delete');
        });

    Route::group(['prefix' => 'pivot', 'as' => 'pivot.'], function () {

        Route::get('/{products_id}', 'ProductsAttributesPivotController@index')->name('index')->where(['products_id' => '[0-9]+']);
        Route::post('/{products_id}', 'ProductsAttributesPivotController@store')->name('store')->where(['products_id' => '[0-9]+']);
        Route::match(['put', 'patch'], '/pivot/{id}/', 'ProductsAttributesPivotController@update')->name('update');
        Route::delete('/pivot/{id}', 'ProductsAttributesPivotController@destroy')->name('delete');
    });

    });
