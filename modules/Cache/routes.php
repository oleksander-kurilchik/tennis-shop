<?php

Route::namespace('\TrekSt\Modules\Cache\Http\Controllers')->group(function () {

    Route::get('cache/clear', 'CacheController@index')->name('cache.clear');

});


