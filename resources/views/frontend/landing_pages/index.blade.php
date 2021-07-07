@extends('layouts.frontend')
@include('frontend.landing_pages.parts.seo',['page'=>$page])


@section('content')
    <div class="p-main-page">

        <div class="container p-main-page__slider-container">
                @include('frontend.landing_pages.parts.index.main-slider')
        </div>


        <div class="b-slider-container ">
            <div class="container">
            @include('frontend.landing_pages.parts.index.slider_top' ,['products'=>$productsTop]  )
            </div>
        </div>

        <div class="b-slider-container-gray ">
            <div class="container">
                @include('frontend.landing_pages.parts.index.slider_sale' ,['products'=>$productsSale]  )
            </div>
        </div>
        <div class="b-slider-container">
            <div class="container">
                @include('frontend.landing_pages.parts.index.slider_news',['products'=>$productsNew]   )
            </div>
        </div>




    </div>




@stop
