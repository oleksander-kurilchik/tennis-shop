<?php


Route::namespace('\TrekSt\Modules\BackendAuth\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
        Route::group(['prefix' => 'auth','as'=>'auth.'], function () {
            Route::get('/login', 'LoginController@showLoginForm')->name('show');
            Route::post('/login', 'LoginController@login')->name('login');
            Route::get('/logout', 'LoginController@logout')->name('logout');

        });

//          Route::any('{query}',"Admin\\AdminController@redirectAdmin")
//              ->where('query', '.*');


    });
});



