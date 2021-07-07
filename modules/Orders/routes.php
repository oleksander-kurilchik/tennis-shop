<?php

Route::namespace('\TrekSt\Modules\Orders\Http\Controllers')->group(function () {


    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', 'OrdersController@index')->name('index');;;
        Route::get('/{id}', 'OrdersController@show')->where('id', '[0-9]+')->name('show');
        Route::delete('/{id}', 'OrdersController@destroy')->where('id', '[0-9]+')->name('delete');
        Route::get('/{id}/edit', 'OrdersController@edit')->where('id', '[0-9]+')->name('edit');
        Route::post('/{id}/rebuild-all-price', 'OrdersController@refreshOrderPrice')
            ->where('id', '[0-9]+')->name('rebuild-all-price');
        Route::post('/{id}/change-order-status', 'OrdersController@changeStatus')->where('id', '[0-9]+')->name('change-order-status');
        Route::match(['put', 'patch'], '/{id}/', 'OrdersController@update')->name('update');
        Route::post('/products/quantity/{id}', 'OrdersController@changeOrdersProductCount')
            ->where('id', '[0-9]+')->name('products.quantity-change');
        Route::delete('/products/{id}', 'OrdersController@deleteProduct')
            ->where('id', '[0-9]+')->name('products.delete');
        Route::post('{id}/products/add', 'OrdersController@addProduct')
            ->where('id', '[0-9]+')->name('products.add');
        Route::get('/create-new-order', 'OrdersController@createNewOrder')->name('create_new_order');
        Route::post('/store-new-order', 'OrdersController@storeNewOrder')->name('store_new_order');
        Route::post('/resend-order-email/{id}', 'OrdersController@resendOrderEmail')->name('resend_order_email');
        Route::get('/search-users', 'OrdersController@searchUsers')->name('search_users');
        Route::get('/{id}/show-email-view', 'OrdersController@showEmailView')->where('id', '[0-9]+')->name('show-email');
    });

    Route::group(['prefix' => 'orders_products', 'as' => 'orders_products.'], function () {

        Route::post('/add/', 'OrdersProductsController@add')->name('add');
        Route::post('/change-qty/{id}', 'OrdersProductsController@changeQty')
            ->where('id', '[0-9]+')->name('change-qty');
        Route::delete('/{id}', 'OrdersProductsController@destroy')->name('delete');

//        Route::get('/create/{orders_id}', 'OrdersServicesController@create')->name('create')->where('orders_id', '[0-9]+');
//        Route::post('/store/{orders_id}', 'OrdersServicesController@store')->name('store')->where('orders_id', '[0-9]+');
//        Route::get('/{id}', 'OrdersServicesController@show')->name('show');
//        Route::get('/{id}/edit', 'OrdersServicesController@edit')->name('edit');
//        Route::match(['put', 'patch'], '/{id}/', 'OrdersServicesController@update')->name('update');
//        Route::delete('/{id}', 'OrdersServicesController@destroy')->name('delete');
//        Route::post('/{id}/sorting', 'OrdersServicesController@sorting')
//            ->where('id', '[0-9]+')->name('sorting');
    });



    Route::group(['prefix' => 'orders_services', 'as' => 'orders_services.'], function () {
        Route::get('/create/{orders_id}', 'OrdersServicesController@create')->name('create')->where('orders_id', '[0-9]+');
        Route::post('/store/{orders_id}', 'OrdersServicesController@store')->name('store')->where('orders_id', '[0-9]+');
        Route::get('/{id}', 'OrdersServicesController@show')->name('show');
        Route::get('/{id}/edit', 'OrdersServicesController@edit')->name('edit');
        Route::match(['put', 'patch'], '/{id}/', 'OrdersServicesController@update')->name('update');
        Route::delete('/{id}', 'OrdersServicesController@destroy')->name('delete');
        Route::post('/{id}/sorting', 'OrdersServicesController@sorting')
            ->where('id', '[0-9]+')->name('sorting');
    });

    Route::group(['prefix' => 'orders_delivery', 'as' => 'orders_delivery.'], function () {
        Route::get('/{orders_id}/edit', 'OrdersDeliveryController@edit')->name('edit')->where('orders_id', '[0-9]+');
        Route::match(['put', 'patch'], '/{orders_id}/', 'OrdersDeliveryController@update')->name('update')->where('orders_id', '[0-9]+');
    });



});




