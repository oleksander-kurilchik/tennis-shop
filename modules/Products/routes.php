<?php

Route::namespace('\TrekSt\Modules\Products\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('/create', 'ProductsController@create')->name('create');
        Route::post('/', 'ProductsController@store')->name('store');
        Route::get('/{id}', 'ProductsController@show')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'ProductsController@edit')->where('id', '[0-9]+')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'ProductsController@update')->name('update');
        Route::delete('/{id}', 'ProductsController@destroy')->name('delete');
        Route::post('/{id}/order', 'ProductsController@order')->where('id', '[0-9]+')->name('order');
        Route::post('/{id}/orderMassImages', 'ProductsController@orderMassImages')->where('id', '[0-9]+')->name('orderMassImages');
        Route::post('/{id}/make-copy', 'ProductsController@makeProductCopy')->where('id', '[0-9]+')->name('make-copy');
        Route::match(['put', 'patch'], '/translating/{id}', 'ProductsTranslatingController@update')->where('id', '[0-9]+')->name('update_translating');
        Route::post('/images', 'ProductsImagesController@store')->name('image.store');
        Route::delete('/images/{id}', 'ProductsImagesController@destroy')->name('image.delete');
        Route::post('/images/{id}/set-logo', 'ProductsImagesController@setLogo')->name('image.set-logo');
        Route::post('/images/{id}/order', 'ProductsImagesController@order')->name('image.order');
        Route::post('/images/rebuild/{products_id}', 'ProductsImagesController@rebuildImages')->name('image.rebuild');
        Route::post('/{id}/price', 'ProductsController@price')->where('id', '[0-9]+')->name('price');
        Route::post('/{id}/published', 'ProductsController@published')->where('id', '[0-9]+')->name('published');


        Route::get('/search-json', 'ProductsController@searchJson')->name('search-json');
      //  Route::post('/{id}/additional-products', 'ProductsController@additionalProducts')->name('additional-products.update');
//            Route::post('/mass-action/published', 'ProductsController@massActionPublished')->where('id', '[0-9]+')->name('mass-action.published');
//            Route::post('/mass-action/unpublished', 'ProductsController@massActionUnpublished')->where('id', '[0-9]+')->name('mass-action.un-published');
//            Route::delete('/mass-action/delete', 'ProductsController@massActionDelete')->name('mass-action.delete');
    });


/*
    Route::group(['prefix' => 'product_additional_categories', 'as' => 'product_additional_categories.'], function () {

        Route::get('/{products_id}', 'ProductsAdditionalCategoriesController@index')->name('index');
         Route::post('/{products_id}', 'ProductsAdditionalCategoriesController@store')->name('store');
    });




    Route::group(['prefix' => 'currencies', 'as' => 'currencies.'], function () {
        Route::get('/', 'CurrenciesController@index')->name('index');

        Route::get('/{id}/edit', 'CurrenciesController@edit')->where('id', '[0-9]+')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'CurrenciesController@update')->name('update');
     });
*/

});
