<?php

Route::namespace('\TrekSt\Modules\Menus\Http\Controllers')->group(function () {

    Route::group(['prefix' => 'menus', 'as' => 'menus.'], function () {
        Route::get('/', 'MenusController@index')->name('index');
        Route::get('/create', 'MenusController@create')->name('create');
        Route::post('/', 'MenusController@store')->name('store');
        Route::get('/{id}', 'MenusController@show')->name('show');
        Route::get('/{id}/edit', 'MenusController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'MenusController@update')->name('update');;
        Route::delete('/{id}', 'MenusController@destroy')->name('delete');
        Route::post('/{id}/order', 'MenusController@sorting')->where('id', '[0-9]+')->name('order');
     });



    Route::group(['prefix' => 'menus/{menu_id}/menu_item', 'as' => 'menu_item.'], function () {
        Route::get('/', 'MenuItemController@index')->name('index');
        Route::get('/create', 'MenuItemController@create')->name('create');
        Route::post('/', 'MenuItemController@store')->name('store');
        Route::get('/{id}', 'MenuItemController@show')->name('show');
        Route::get('/{id}/edit', 'MenuItemController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'MenuItemController@update')->name('update');;
        Route::delete('/{id}', 'MenuItemController@destroy')->name('delete');
        Route::post('/order', 'MenuItemController@order')->name('order');
    });




















});





