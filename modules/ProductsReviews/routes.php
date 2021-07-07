<?php
Route::namespace('\TrekSt\Modules\ProductsReviews\Http\Controllers\Admin')->group(function () {

    Route::group(['prefix' => 'products-reviews', 'as' => 'products-reviews.'], function () {
        Route::get('/', 'ProductsReviewsController@index')->name('index');
        Route::get('/create', 'ProductsReviewsController@create')->name('create');
        Route::post('/', 'ProductsReviewsController@store')->name('store');
        Route::get('/{id}', 'ProductsReviewsController@show')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'ProductsReviewsController@edit')->where('id', '[0-9]+')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'ProductsReviewsController@update')->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}/', 'ProductsReviewsController@destroy')->where('id', '[0-9]+')->name('delete');
        Route::post('/{id}/update-create-answer', 'ProductsReviewsController@updateCreateAnswer')->where('id', '[0-9]+')->name('answer.create-update');
        Route::delete('/{id}/delete-answer', 'ProductsReviewsController@deleteAnswer')->where('id', '[0-9]+')->name('answer.delete');
        Route::delete('/delete-mass', 'ProductsReviewsController@deleteMass')->name('delete_mass');
        Route::post('/revised/', 'ProductsReviewsController@revised')->name('revised');
    });
//
});



