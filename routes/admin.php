<?php


Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => ['auth_backend','admin_middleware'], 'as' => 'admin.'], function () {

        Route::pattern('id', '[0-9]+');


        include base_path().'/modules/AdminHome/routes.php';
        include base_path().'/modules/LandingPages/routes.php';
        include base_path().'/modules/BackendUsersLog/routes.php';
        include base_path().'/modules/ArtisanCommands/routes.php';
        include base_path().'/modules/DownloadedFiles/routes.php';
        include base_path().'/modules/Menus/routes.php';
        include base_path().'/modules/LaravelLogViewer/routes.php';
        include base_path().'/modules/BackendUsers/routes.php';
        include base_path().'/modules/Settings/routes.php';
        include base_path().'/modules/RobotsTxt/routes.php';
        include base_path().'/modules/MaintenanceMode/routes.php';
        include base_path().'/modules/FileManager/routes.php';
        include base_path().'/modules/Cache/routes.php';
        include base_path().'/modules/Categories/routes.php';
        include base_path().'/modules/Products/routes.php';
        include base_path().'/modules/Filters/routes.php';
        include base_path().'/modules/Orders/routes.php';
        include base_path().'/modules/Authorization/routes.php';
        include base_path().'/modules/BackendAccount/routes.php';
        include base_path().'/modules/FrontendUsers/routes.php';
        include base_path().'/modules/MainSlider/routes.php';
        include base_path().'/modules/ProductsAttributes/routes.php';
        include base_path().'/modules/ProductsVariations/routes.php';
        include base_path().'/modules/ProductsReviews/routes.php';
        include base_path().'/modules/Feedback/routes.php';



    });

    include base_path().'/modules/BackendAuth/routes.php';


});

Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['auth_backend']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
