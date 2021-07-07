<?php
Route::namespace('\TrekSt\Modules\Feedback\Http\Controllers\Admin')->group(function () {
    Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], function () {

        Route::get('/', 'FeedbackController@index')->name('index');
        Route::get('/{id}', 'FeedbackController@show')->name('show');
        Route::get('/{id}/show-email', 'FeedbackController@showEmail')->name('show-email');
        Route::post('/{id}/answered', 'FeedbackController@answered')->name('answered');
        Route::delete('/{id}', 'FeedbackController@destroy')->name('delete');

    });
});



