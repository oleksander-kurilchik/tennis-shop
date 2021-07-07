@extends('layouts.frontend')
@section('seo_title') @lang('profile.orders.title')@stop

@section('seo_description')@lang('profile.orders.title')@stop

@section('seo_keywords')@lang('profile.orders.title')@stop
@section('content')
    <div class="p-profile  p-profile-orders ">

        <div class="p-profile__title-container">
            @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.account.profile.order-history'])
            @include('frontend.global.parts.page_title',['title'=>trans('profile.orders.title')])
        </div>
        <div class="p-profile__menu ">
            <div class="p-profile__menu-container container">
                @include('frontend.account.user.parts.menu',['active'=>'orders'])
            </div>
        </div>
        <div class="p-profile__container ">
            <div class="p-profile__content container">
                @if($ordersActual->isNotEmpty())
                    <div class="p-profile-orders__orders">
                    <div class="p-profile-orders__orders-title">
                        @lang('profile.orders.actual_orders') ({{$ordersActual->count()}})
                    </div>
                    <div class="p-profile-orders__orders-list">
                        @foreach($ordersActual as $item)
                            <div class="p-profile-orders__orders-item">
                                @include('frontend.account.user.parts.order_item',['order'=>$item ])
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if($ordersComplete->isNotEmpty())
                <div class="p-profile-orders__orders">
                    <div class="p-profile-orders__orders-title">

                        @lang('profile.orders.complete_orders')
                    </div>
                    <div class="p-profile-orders__orders-list">
                        @foreach($ordersComplete as $item)
                            <div class="p-profile-orders__orders-item">
                            @include('frontend.account.user.parts.order_item',['order'=>$item])
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if($ordersActual->isEmpty() && $ordersComplete->isEmpty() )
                    @include('frontend.account.user.parts.order-history.empty')
{{--                        <div class="b-message-block">--}}
{{--                            <div class="b-message-block__icon">--}}
{{--                                <svg width="99" height="95" viewBox="0 0 99 95" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M91.5717 43.5419V47.665C91.5605 67.2996 78.6504 84.5881 59.8425 90.1552C41.0346 95.7223 20.8093 88.2418 10.1345 71.7702C-0.540319 55.2987 0.87836 33.76 13.6212 18.8343C26.364 3.90865 47.3954 -0.848403 65.3102 7.14286" stroke="#14C04A" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    <path d="M96 7.76355L47.2857 56.532L34 43.2315" stroke="#14C04A" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                </svg>--}}
{{--                                <svg width="99" height="95"    version="1.1"  x="0" y="0" viewBox="0 0 446.853 446.853" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>--}}
{{--                                        <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708   c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179   c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591   l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916   c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012   s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675   c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432   c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221   c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814   c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z    M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117   S337.916,409.814,327.373,409.814z" fill="#14c04a" data-original="#000000" style="" class=""/>--}}

{{--                                        </g></svg>--}}

{{--                            </div>--}}
{{--                            <div class="b-message-block__title">--}}
{{--                                @lang('profile.orders.empty.title')--}}
{{--                            </div>--}}

{{--                            <div class="b-message-block__description pb-0">--}}
{{--                                @lang('profile.orders.empty.description')--}}
{{--                            </div>--}}

{{--                        </div>--}}
                 @endif





            </div>
        </div>
    </div>
@stop


