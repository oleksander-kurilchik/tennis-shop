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
    'prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localize' ,'localizationRedirect','web','frontend'], 'as' => 'frontend.'
], function () {

    Route::get('/', "Frontend\\LandingPagesController@index")->name("index");




    Route::group(['as' => 'categories.', 'prefix' => 'categories'], function () {
        Route::get('/{slug}', 'Frontend\\CategoriesController@show')->name('show')->where('slug', '.*');

    });
    Route::group(['as' => 'products.'], function () {
        Route::get('/product/{slug}', 'Frontend\ProductsController@show')->name('show');
        Route::get('/search', 'Frontend\ProductsSearchController@search')->name('search');

        Route::get('/sale', 'Frontend\ProductsController@sale')->name('sale');
        Route::get('/top', 'Frontend\ProductsController@top')->name('top');
        Route::get('/news', 'Frontend\ProductsController@sale')->name('news');

    });



    Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
        Route::get('/', 'Frontend\CartController@index')->name('index')->middleware(['frontend-phone-empty']);
        Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout');
        Route::post('/add', 'Frontend\CartController@add')->name('add');
//        Route::post('/buy-one-click', 'Frontend\OneClickBuyController@buySubmit')->name('buy-one-click');
        Route::post('/all-cart', 'Frontend\CartController@allCart')->name('all-cart');
        Route::post('/change-count', 'Frontend\CartController@changeCount')->name('change-count');
        Route::post('/delete-from-cart', 'Frontend\CartController@deleteFromCart')->name('delete-from-cart');
        Route::post('/get-warehouses', 'Frontend\CartController@getWarehousesByRef')->name('get-warehouses');
        Route::post('/order-submit', 'Frontend\CartController@orderSubmit')->name('order-submit')->middleware(['frontend-phone-empty']);
        Route::get('/success', 'Frontend\CartController@orderCompete')->name('success');

    });

    Route::group(['as' => 'reviews.', 'prefix' => 'reviews'], function () {
        Route::post('/add','\TrekSt\Modules\ProductsReviews\Http\Controllers\Frontend\ProductsReviewsController@add')->name('add');
        Route::post('/product/','\TrekSt\Modules\ProductsReviews\Http\Controllers\Frontend\ProductsReviewsController@getReviewsForProduct')->name('product');
     });




    Route::group(['as' => 'delivery.','prefix'=>'delivery'], function () {
        Route::any('cities', '\TrekSt\Modules\Delivery\Controllers\Frontend\DeliveryController@getCitiesList')->name('cities');
        Route::any('warehouses', '\TrekSt\Modules\Delivery\Controllers\Frontend\DeliveryController@getWarehousesList')->name('warehouses');
    });


    Route::group(['as' => 'feedback.', 'prefix' => 'feedback'], function () {
        Route::post('send', '\TrekSt\Modules\Feedback\Http\Controllers\Frontend\FeedbackController@send')->name('send');
    });



    Route::group(['as' => 'landing_pages.'], function () {
        Route::get('/{slug}', 'Frontend\LandingPagesController@show')->name('show');
    });



});


//Route::get('/', function () {
//    return view('frontend.landing_pages.index');
//});
//
//Route::get('/auth/login', function () {
//    return view('frontend.auth.login');
//});
//
//Route::get('/auth/reg', function () {
//    return view('frontend.auth.reg');
//});


//Route::get('/catalog', function () {
//    return view('frontend.catalog.index');
//});


Route::get('/contacts', function () {
    return view('frontend.landing_pages.contacts');
});


Route::get('/pages/show', function () {
    return view('frontend.landing_pages.show');
});
//
//
//Route::get('/cart/index', function () {
//    return view('frontend.cart.index');
//});




Route::get('/modal/show', function () {
    return view('frontend.modal.show');
});

Route::get('/products/show', function () {
    return view('frontend.products.show');
});


Route::get('/profile/info', function () {
    return view('frontend.profile.info');
});

Route::get('/profile/edit', function () {
    return view('frontend.profile.edit');
});

Route::get('/profile/change-password', function () {
    return view('frontend.profile.change_password');
});


Route::get('/profile/wishlist', function () {
    return view('frontend.profile.wishlist');
});


Route::get('/profile/orders', function () {
    return view('frontend.profile.orders');
});



include base_path('routes/web/account.php');
