<?php
Route::namespace('\TrekSt\Modules\ArtisanCommands\Http\Controllers')->group(function () {
            Route::group(['prefix' => 'artisan_commands', 'as' => 'artisan_commands.'], function () {
            Route::get('/', 'ArtisanCommandsController@index')->name('index');
            Route::get('/{id}', 'ArtisanCommandsController@show')->name('show');
            Route::post('/{id}/execute', 'ArtisanCommandsController@execute')->name('execute');
         });
        
});



