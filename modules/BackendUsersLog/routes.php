<?php
Route::namespace('\TrekSt\Modules\BackendUsersLog\Login\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'backend_users_log', 'as' => 'backend_users_log.'], function () {
        Route::get("login_log", "LoginLogController@index")->name("login.index");
     });

});



