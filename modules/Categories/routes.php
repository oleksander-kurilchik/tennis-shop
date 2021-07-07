<?php

Route::namespace('\TrekSt\Modules\Categories\Http\Controllers')->group(function () {

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', 'CategoriesController@index')->name('index');
        Route::get('/create', 'CategoriesController@create')->name('create');
        Route::post('/', 'CategoriesController@store')->name('store');
        Route::get('/edit-categories-hierarchy', 'CategoriesController@editCategoriesHierarchy')->name('edit-categories-hierarchy');
        Route::post('/edit-categories-hierarchy', 'CategoriesController@updateCategoriesHierarchy')->name('update-categories-hierarchy');
        Route::get('/{id}', 'CategoriesController@show')->name('show');
        Route::get('/{id}/edit', 'CategoriesController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'CategoriesController@update')->name('update');;
        Route::delete('/{id}', 'CategoriesController@destroy')->name('delete');
        Route::post('/{id}/order', 'CategoriesController@order')->where('id', '[0-9]+')->name('order');
        Route::post('/{id}/publish-products', 'CategoriesController@publishAllProducts')->where('id', '[0-9]+')->name('publish_products');
        Route::post('/{id}/unpublish-products', 'CategoriesController@unpublishAllProducts')->where('id', '[0-9]+')->name('unpublish_products');
        Route::match(['put', 'patch'], '/categories-translating/{id}', 'CategoriesTranslatingController@update')
            ->where('id', '[0-9]+')->name('update_translating');
        Route::post('/categories-images', 'CategoriesImagesController@store')->name('image.store');
        Route::delete('categories-images/{id}', 'CategoriesImagesController@destroy')->name('image.delete');
        Route::post('/categories-images/{id}/set-logo', 'CategoriesImagesController@setLogo')->name('image.set-logo');




    });


});



