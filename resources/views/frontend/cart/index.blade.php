@extends('layouts.frontend')

@section('seo_title') @lang('cart.title')@stop

@section('seo_description')@lang('cart.title')@stop

@section('seo_keywords')@lang('cart.title')@stop


@section('content')
    <div class="p-cart  " >
        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.cart.index'])
        @include('frontend.global.parts.page_title',['title'=>trans('cart.title')])
        <div class="p-cart__content  container " id="cart_index">
            <div class="row">
                <div class="col-lg-8   ">
                    <div class="p-cart__products-items">
                        <template v-for="product in cart.items">
                            <cart-product-item v-on:count-change="productCountChangeHandler"
                                               v-on:delete-item="deleteProductFromCart" :product="product"
                                               :is_disabled="isRequestProcesed"></cart-product-item>
                        </template>
{{--                        @foreach(range(0,2) as $item)--}}
{{--                            @include('frontend.cart.parts.cart_item')--}}
{{--                        @endforeach--}}
                    </div>

                    <div class="p-cart__user-details-column">
                        @include('frontend.cart.parts.form_user_details')
                    </div>



                </div>
                <div class="col-lg-4 ">
                    @include('frontend.cart.parts.form_payment_delivery')

                </div>
            </div>
        </div>
    </div>

@stop

