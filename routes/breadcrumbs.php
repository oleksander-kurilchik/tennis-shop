<?php

Breadcrumbs::register('frontend.index', function ($breadcrumbs) {
    $breadcrumbs->push(trans("breadcrumbs.index"), route("frontend.index"));
});



////
Breadcrumbs::register('frontend.landing_page.show', function ($breadcrumbs , $page)  {
    $breadcrumbs->parent('frontend.index' );
    $breadcrumbs->push($page->trans->title, $page->url);
});


//Breadcrumbs::register('frontend.catalog', function ($breadcrumbs) {
//
//    $breadcrumbs->parent('frontend.index');
//    $breadcrumbs->push(trans("breadcrumbs.catalog"), route('frontend.catalog.index'));
//});




Breadcrumbs::register('frontend.categories.show', function ($breadcrumbs, $category) {
    if ($category->parent != null) {
        $breadcrumbs->parent('frontend.categories.show', $category->parent);
    } else {
        $breadcrumbs->parent('frontend.index');
    }

    $breadcrumbs->push($category->trans->title, $category->url );
});
//
//
////
Breadcrumbs::register('frontend.products.show', function ($breadcrumbs , $product)  {
    $breadcrumbs->parent('frontend.categories.show',$product->category);
    $breadcrumbs->push($product->trans->title, $product->url);
});
Breadcrumbs::register('frontend.products.search', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.index');
    $breadcrumbs->push(trans('breadcrumbs.search'), route('frontend.products.search'));
});



Breadcrumbs::register('frontend.products.sale', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.index' );
    $breadcrumbs->push(trans('breadcrumbs.product.sale'),
        route('frontend.products.sale'));
});
Breadcrumbs::register('frontend.products.news', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.index' );
    $breadcrumbs->push(trans('breadcrumbs.product.news'),
        route('frontend.products.news'));
});
Breadcrumbs::register('frontend.products.top', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.index' );
    $breadcrumbs->push(trans('breadcrumbs.product.top'),
        route('frontend.products.top'));
});



Breadcrumbs::register('frontend.cart.index', function ($breadcrumbs) {

    $breadcrumbs->parent('frontend.index');
    $breadcrumbs->push(trans("breadcrumbs.cart"), route('frontend.cart.index'));
});

Breadcrumbs::register('frontend.cart.checkout', function ($breadcrumbs) {

    $breadcrumbs->parent('frontend.cart.index');
    $breadcrumbs->push(trans("breadcrumbs.cart_checkout"), route('frontend.cart.checkout'));
});


Breadcrumbs::register('frontend.account.profile.show', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.index');
    $breadcrumbs->push(trans("breadcrumbs.account.profile.show"), route('frontend.account.profile.show'));
});

Breadcrumbs::register('frontend.account.profile.edit', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.account.profile.show');
    $breadcrumbs->push(trans("breadcrumbs.account.profile.edit"), route('frontend.account.profile.edit'));
});


Breadcrumbs::register('frontend.account.profile.change-password', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.account.profile.show');
    $breadcrumbs->push(trans("breadcrumbs.account.profile.change-password"), route('frontend.account.profile.change-password'));
});



Breadcrumbs::register('frontend.account.profile.personal-manager', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.account.profile.show');
    $breadcrumbs->push(trans("breadcrumbs.account.profile.personal-manager"), route('frontend.account.profile.personal-manager'));
});

Breadcrumbs::register('frontend.account.profile.order-history', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.account.profile.show');
    $breadcrumbs->push(trans("breadcrumbs.account.profile.order-history"), route('frontend.account.profile.order-history'));
});






Breadcrumbs::register('frontend.message', function ($breadcrumbs )  {
    $breadcrumbs->parent('frontend.index' );
    $breadcrumbs->push(trans('breadcrumbs.message'), null);
});




