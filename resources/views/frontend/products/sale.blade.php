@extends('layouts.frontend')
@if($page->trans->seo_title!=null)
@section('seo_title') {{$page->trans->seo_title}}@stop
@endif

@if($page->trans->seo_description!=null)
@section('seo_description'){{$page->trans->seo_description}}@stop
@endif

@if($page->trans->seo_keywords!=null)
@section('seo_keywords'){{$page->trans->seo_keywords}}@stop
@endif


@section('content')
    <div class="p-catalog p-products-sale ">

        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.products.sale'])
        @include('frontend.global.parts.page_title',['title'=>$page->trans->title])

        <div class="  p-catalog__container container pt-4">
            <div class="row">
                <div class="  col-lg-81 col-xxl-91">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-4 pt-1">
                                @include('frontend.global.parts.product_item', ['product'=>$product])
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12">
                    {!! $products->appends(request()->except('page'))->links() !!}
                </div>
            </div>
        </div>
        @include('frontend.catalog.parts.slider_viewed',['products'=>\LastViewedProducts::getProducts()])
    </div>
@stop
