<?php
Route::namespace('\TrekSt\Modules\DownloadedFiles\Http\Controllers')->group(function () {

    Route::group(['prefix' => 'downloaded_files', 'as' => 'downloaded_files.'], function () {
        Route::get('/', 'DownloadedFilesController@index')->name('index');
        Route::get('/create', 'DownloadedFilesController@create')->name('create');
        Route::post('/', 'DownloadedFilesController@store')->name('store');
        Route::post('/store/storeckeditor', 'DownloadedFilesController@storeCKEditor')->name('storeCkeditor');
        Route::get('/{id}', 'DownloadedFilesController@show')->name('show');
        Route::get('/{id}/edit', 'DownloadedFilesController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'DownloadedFilesController@update')->name('update');
        Route::delete('/{id}', 'DownloadedFilesController@destroy')->name('delete');
        Route::post('/{id}/sorting', 'DownloadedFilesController@sorting')
            ->where('id', '[0-9]+')->name('sorting');
    });

});



