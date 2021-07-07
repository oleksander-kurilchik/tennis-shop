@extends('layouts.frontend')

@section('content')
    <div class="p-profile  p-profile-wishlist ">

        <div class="p-profile__title-container">
            @include('frontend.global.parts.breadcrumbs')
            @include('frontend.global.parts.page_title',['title'=>'Кабінет'])
        </div>
        <div class="p-profile__menu ">
            <div class="p-profile__menu-container container">
                @include('frontend.account.user.parts.menu',['active'=>'wishlist'])
            </div>
        </div>
        <div class="p-profile__container ">
            <div class="p-profile__content container">
                @if($products->isNotEmpty())
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 py-3 p-profile-wishlist__item">
                        @include('frontend.account.user.parts.wishlist.product_item',['product'=>$product])
                    </div>
                    @endforeach
                </div>
                @else
                    @include('frontend.account.user.parts.wishlist.empty')

                @endif




            </div>
        </div>
    </div>
@stop


