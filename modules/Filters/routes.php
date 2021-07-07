<?php

Route::namespace('\TrekSt\Modules\Filters\Http\Controllers')->group(function () {



    Route::group(['prefix' => 'filters', 'as' => 'filters.'], function () {
        Route::get('/', 'FiltersController@index')->name('index');
        Route::get('/create', 'FiltersController@create')->name('create');
        Route::post('/', 'FiltersController@store')->name('store');
        Route::get('/{id}', 'FiltersController@show')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'FiltersController@edit')->where('id', '[0-9]+')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'FiltersController@update')->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', 'FiltersController@destroy')->where('id', '[0-9]+')->name('delete');
        Route::post('/{id}/order', 'FiltersController@order')->where('id', '[0-9]+')->name('order');
        Route::match(['put', 'patch'], '/translating/{id}', 'FiltersTranslatingController@update')->where('id', '[0-9]+')->name('update_translating');
    });


    Route::group(['prefix' => 'filters_values/{filters_id}/', 'as' => 'filters_values.'], function () {
        Route::get('/', 'FiltersValuesController@index')->where('filters_id', '[0-9]+')->name('index');
        Route::get('/create', 'FiltersValuesController@create')->where('filters_id', '[0-9]+')->name('create');
        Route::post('/', 'FiltersValuesController@store')->where('filters_id', '[0-9]+')->name('store');
        Route::get('/{id}', 'FiltersValuesController@show')->where('filters_id', '[0-9]+')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'FiltersValuesController@edit')->where('filters_id', '[0-9]+')->where('id', '[0-9]+')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'FiltersValuesController@update')->where('filters_id', '[0-9]+')->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', 'FiltersValuesController@destroy')->where('filters_id', '[0-9]+')->where('id', '[0-9]+')->name('delete');
        Route::post('/{id}/order', 'FiltersValuesController@order')->where('filters_id', '[0-9]+')->where('id', '[0-9]+')->name('order');
        Route::match(['put', 'patch'], '/translating/{id}', 'FiltersValuesTranslatingController@update')->where('filters_id', '[0-9]+')->where('id', '[0-9]+')->name('update_translating');
    });


    Route::group(['prefix' => 'products_filters/{products_id}/', 'as' => 'products_filters.'], function () {
        Route::get('/', 'ProductsFiltersController@index')->where('products_id', '[0-9]+')->name('index');
        Route::post('/', 'ProductsFiltersController@update')->where('products_id', '[0-9]+')->name('update');
    });



});











