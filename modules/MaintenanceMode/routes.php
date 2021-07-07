<?php
Route::namespace('\TrekSt\Modules\MaintenanceMode\Http\Controllers')->group(function () {
    Route::group(['prefix' => 'maintenance_mode', 'as' => 'maintenance_mode.'], function () {
            Route::get('/', 'MaintenanceModeController@index')->name('index');
            Route::post('toggle-mode', 'MaintenanceModeController@toggleMode')->name('toggleMode');
        });
});



