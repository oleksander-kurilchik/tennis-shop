<?php
Route::namespace('\TrekSt\Modules\FileManager\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'file_manager', 'as' => 'file_manager.'], function () {
        Route::get('/', 'FileManagerController@index')->name('index');
    });
});



