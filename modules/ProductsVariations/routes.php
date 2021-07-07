<?php

Route::namespace('\TrekSt\Modules\ProductsVariations\Http\Controllers\Admin')->prefix('products_variations')
    ->name('products_variations.')->group(function () {
        Route::group(['prefix' => 'groups', 'as' => 'groups.'], function () {
            Route::get('/{products_id}', 'ProductsVariationsGroupsController@index')->name('index')->where('products_id', '[0-9]+');
            Route::get('/{products_id}/create', 'ProductsVariationsGroupsController@create')->name('create')->where('products_id', '[0-9]+');
            Route::post('/{products_id}/', 'ProductsVariationsGroupsController@store')->name('store')->where('products_id', '[0-9]+');
            Route::get('/{products_id}/group/{id}', 'ProductsVariationsGroupsController@show')
                ->where('id', '[0-9]+')->where('products_id', '[0-9]+')->name('show');



            Route::get('/group/{id}', 'ProductsVariationsGroupsController@edit')
                ->where('id', '[0-9]+')->name('edit');
            Route::match(['put', 'patch'], '/group/{id}/', 'ProductsVariationsGroupsController@update')
                ->where('products_id', '[0-9]+')->name('update');
            Route::delete('/group/{id}', 'ProductsVariationsGroupsController@destroy')
                ->where('products_id', '[0-9]+')->name('delete');
        });


        Route::group(['prefix' => 'items', 'as' => 'items.'], function () {
            Route::get('/{group_id}', 'ProductsVariationsItemsController@index')->name('index')->where('group_id', '[0-9]+');
            Route::get('/{group_id}/create', 'ProductsVariationsItemsController@create')->name('create')->where('group_id', '[0-9]+');
            Route::post('/{group_id}', 'ProductsVariationsItemsController@store')->name('store')->where('group_id', '[0-9]+');
//            Route::get('/group/{id}', 'ProductsVariationsItemsController@show')->where('id', '[0-9]+')->name('show');
            Route::get('/items/{id}/edit', 'ProductsVariationsItemsController@edit')->where('id', '[0-9]+')->name('edit');
            Route::match(['put', 'patch'], '/items/{id}/', 'ProductsVariationsItemsController@update')->name('update');
            Route::delete('/items/{id}', 'ProductsVariationsItemsController@destroy')->name('delete');
        });




    });
