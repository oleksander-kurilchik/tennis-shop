<?php



Route::namespace('\TrekSt\Modules\Currencies\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'currencies', 'as' => 'currencies.'], function () {
        Route::get('/', 'CurrenciesController@index')->name('index');

        Route::get('/{id}/edit', 'CurrenciesController@edit')->where('id', '[0-9]+')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'CurrenciesController@update')->name('update');
    });


});
