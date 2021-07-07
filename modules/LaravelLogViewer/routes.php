<?php
Route::namespace('\TrekSt\Modules\LaravelLogViewer\Http\Controllers')->group(function () {
     Route::get('laravel_log_viewer', 'LaravelLogViewerController@index')->name('laravel_log_viewer.index');
});



