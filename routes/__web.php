<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localize','verified_frontend','auth:frontend',
        'frontend-is-inactive', 'frontend-is-blocked'
        ,'localizationRedirect','web','frontend-middleware'], 'as' => 'frontend.'
], function () {

    Route::get('/', "Frontend\\LandingPagesController@index")->name("index");

    Route::group(['as' => 'categories.', 'prefix' => 'categories'], function () {
        Route::get('/{slug}', 'Frontend\\CategoriesController@show')->name('show')->where('slug', '.*');

    });
    Route::group(['as' => 'products.'], function () {
        Route::get('/product/{slug}', 'Frontend\ProductsController@show')->name('show');

    });





    Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
        Route::get('/', 'Frontend\CartController@index')->name('index');
        Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout');
        Route::post('/add', 'Frontend\CartController@add')->name('add');
//        Route::post('/buy-one-click', 'Frontend\OneClickBuyController@buySubmit')->name('buy-one-click');
        Route::post('/all-cart', 'Frontend\CartController@allCart')->name('all-cart');
        Route::post('/change-count', 'Frontend\CartController@changeCount')->name('change-count');
        Route::post('/delete-from-cart', 'Frontend\CartController@deleteFromCart')->name('delete-from-cart');
        Route::post('/get-warehouses', 'Frontend\CartController@getWarehousesByRef')->name('get-warehouses');
        Route::post('/order-submit', 'Frontend\CartController@orderSubmit')->name('order-submit');
        Route::get('/success', 'Frontend\CartController@orderCompete')->name('success');

    });


    Route::group(['as' => 'landing_pages.'], function () {
        Route::get('/{slug}', 'Frontend\LandingPagesController@show')->name('show');
    });




});


include base_path('routes/web/account.php');



