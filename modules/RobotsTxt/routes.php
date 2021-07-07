<?php
Route::namespace('\TrekSt\Modules\RobotsTxt\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'edit_robots_txt', 'as' => 'edit_robots_txt.'], function () {
        Route::get('/robots_txt', 'RobotsTxtController@edit')->name('edit');
        Route::post('/robots_txt', 'RobotsTxtController@update')->name('update');
    });
});



