<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),], function () {

    Route::group(['middleware' => ['web',  'frontend'], "prefix" => "account", 'as' => 'frontend.account.'],
        function () {
            Route::get('login', 'Account\Auth\LoginController@showLoginForm')->name('login');
            Route::post('login', 'Account\Auth\LoginController@login');
            Route::post('logout', 'Account\Auth\LoginController@logout')->name('logout');
            Route::get('logout', 'Account\Auth\LoginController@logout')->name('logout');

            // Registration Routes...
            Route::get('register', 'Account\Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Account\Auth\RegisterController@register');

            // Password Reset Routes...
            Route::get('password/reset',
                'Account\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('password/email',
                'Account\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            Route::get('password/reset/{token}',
                'Account\Auth\ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('password/reset', 'Account\Auth\ResetPasswordController@reset')->name('password.update');


            Route::group([
                'middleware' => ['auth:frontend', 'verified_frontend', 'frontend_profile'], "prefix" => "profile", 'as' => "profile."
            ],
                function () {
                    Route::get('/', 'Frontend\Account\ProfileController@show')->name('show');
                    Route::get('/edit', 'Frontend\Account\ProfileController@edit')->name('edit');
                    Route::post('/edit', 'Frontend\Account\ProfileController@update')->name('update');
                    Route::get('/change-password',
                        'Frontend\Account\PasswordController@showEditForm')->name('change-password');
                    Route::post('/change-password',
                        'Frontend\Account\PasswordController@changePassword')->name('change-password');
                    Route::get('/order-history', 'Frontend\Account\OrdersController@show')->name('order-history');


                    Route::group(['as' => 'wishlist.', 'prefix' => 'wishlist'], function () {
                        Route::post('/add',
                            '\TrekSt\Modules\WishList\Http\Controllers\Frontend\WishlistController@add')->name('add')
                        ->withoutMiddleware('frontend_profile')
                        ;
                        Route::post('/remove',
                            '\TrekSt\Modules\WishList\Http\Controllers\Frontend\WishlistController@remove')->name('remove');
                        Route::get('/', 'Frontend\Account\WishListController@show')->name('index');
                    });


                });


//            Route::group(['middleware' => ['verified_frontend'], "prefix" => "blocked", 'as' => "blocked."],
//                function () {
//                    Route::get('/inactive', 'Account\Block\BlockedController@showInactive')->name('inactive');
//                    Route::get('/blocked', 'Account\Block\BlockedController@showBlocked')->name('blocked');
//                });


        });
        Route::group(['middleware' => ['web', 'frontend','auth:frontend'], "prefix" => "account", 'as' => 'frontend.account.'],
            function () {
                Route::get('email/verify', 'Account\Auth\VerificationController@show')->name('verification.notice');
                Route::get('email/verify/{id}/{hash}',
                    'Account\Auth\VerificationController@verify')->name('verification.verify');
                Route::post('email/resend', 'Account\Auth\VerificationController@resend')->name('verification.resend');
            });


});
Route::group(['middleware' => ['web'], "prefix" => "account/auth", 'as' => 'frontend.account.auth.'], function () {


    Route::group([  'as' => "social."], function () {
        Route::get('/{provider}/', 'Account\Auth\AuthSocialController@redirectTo')->name('redirect');
        Route::get('/{provider}/callback', 'Account\Auth\AuthSocialController@handleCallback')->name('callback');
    });


//    Route::group(["prefix" => "google", 'as' => "google."], function () {
//        Route::get('/', 'Account\Auth\AuthGoogleController@redirectTo');
//        Route::get('/callback', 'Account\Auth\AuthGoogleController@handleCallback');
//    });




});
