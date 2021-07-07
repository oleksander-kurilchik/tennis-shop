<?php
Route::namespace('\TrekSt\Modules\MainSlider\Http\Controllers')->group(function () {


    Route::group(['prefix' => 'main-slider', 'as' => 'main-slider.'], function () {
        Route::get('/', 'MainSliderController@index')->name('index');
        Route::get('/create', 'MainSliderController@create')->name('create');
        Route::post('/', 'MainSliderController@store')->name('store');
        Route::get('/{id}', 'MainSliderController@show')->name('show');
        Route::get('/{id}/edit', 'MainSliderController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'MainSliderController@update')->name('update');
        Route::delete('/{id}', 'MainSliderController@destroy')->name('delete');
        Route::post('/{id}/order', 'MainSliderController@order')->where('id', '[0-9]+')->name('order');
    });



});


