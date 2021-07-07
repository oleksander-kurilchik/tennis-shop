<?php
Route::namespace('\TrekSt\Modules\Settings\Http\Controllers')->group(function () {
        Route::group(['prefix' => 'settings','as'=>'settings.'], function () {
            Route::get('/', 'SettingsController@index')->name('index');
            Route::post('/store-setting', 'SettingsController@storeSettings')->name('store-setting');
            Route::get('/create', 'SettingsController@create')->name('create');
            Route::post('/', 'SettingsController@store')->name('store');
            Route::get('/{id}', 'SettingsController@show')->name('show');
            Route::get('/{id}/edit', 'SettingsController@edit')->name('edit');
            Route::match(['put', 'patch'], '/{id}/', 'SettingsController@update')->name('update');
            Route::delete('/{id}', 'SettingsController@destroy')->name('delete');
            Route::post('/{id}/sorting', 'SettingsController@sorting')->where('id', '[0-9]+')->name('sorting');
        });
//
});



