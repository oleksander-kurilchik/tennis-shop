@extends('layouts.frontend')

@section('seo_title') @lang('cart.title')@stop

@section('seo_description')@lang('cart.title')@stop

@section('seo_keywords')@lang('cart.title')@stop


@section('content')
    <div class="p-cart  " >
        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.cart.index'])
        @include('frontend.global.parts.page_title',['title'=>trans('cart.title')])
        <div class="p-cart__content  container "  >
            <div class="row">

                <div class="p-cart__content-success col-12">
                    <div class="p-cart__message-block">
                        <div class="p-cart__message-block-icon">
                            <svg width="99" height="95" viewBox="0 0 99 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M91.5717 43.5419V47.665C91.5605 67.2996 78.6504 84.5881 59.8425 90.1552C41.0346 95.7223 20.8093 88.2418 10.1345 71.7702C-0.540319 55.2987 0.87836 33.76 13.6212 18.8343C26.364 3.90865 47.3954 -0.848403 65.3102 7.14286" stroke="#14C04A" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M96 7.76355L47.2857 56.532L34 43.2315" stroke="#14C04A" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>
                        <div class="p-cart__message-block-title">
                            @lang('cart.success.title')
                        </div>

                        <div class="p-cart__message-block-description">
                            @lang('cart.success.description')
                        </div>

                        <div class="p-cart__message-block-buttons">
                            @if(Auth::guard('frontend')->check())
                            <div class="p-cart__message-block-button-item">
                                <a href="{{route('frontend.account.profile.order-history')}}" class=" p-cart__message-block-button button-default">переглянути замовлення</a>
                            </div>
                            @endif
                            <div class="p-cart__message-block-button-item">
                                <a href="{{route('frontend.index')}}" class=" p-cart__message-block-button button-default-primary">продовжити покупки</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@stop

