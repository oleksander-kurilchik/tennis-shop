<?php

Route::namespace('\TrekSt\Modules\LandingPages\Http\Controllers\Admin')->group(function () {

    Route::group(['prefix' => 'landing_pages', 'as' => 'landing_pages.'], function () {
        Route::get('/', 'LandingPagesController@index')->name('index');
        Route::get('/create', 'LandingPagesController@create')->name('create');
        Route::post('/', 'LandingPagesController@store')->name('store');
        Route::get('/{id}', 'LandingPagesController@show')->name('show');
        Route::get('/{id}/edit', 'LandingPagesController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'LandingPagesController@update')->name('update');
        Route::delete('/{id}', 'LandingPagesController@destroy')->name('delete');
        Route::match(['put', 'patch'], '/translating/{id}', 'LandingPagesTranslatingController@update')->where('id', '[0-9]+')->name('update_translating');

    });

    Route::group(['prefix' => 'landing_pages_items', 'as' => 'landing_pages_items.'], function () {
        Route::post('/', 'LandingPagesItemsController@store')->name('store');
        Route::match(['put', 'patch'], '/{id}/', 'LandingPagesItemsController@update')->name('update');
        Route::delete('/{id}', 'LandingPagesItemsController@destroy')->name('delete');
    });




});


