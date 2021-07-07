@extends('layouts.frontend')

@section('seo_title') {{$product->front->seo_title}}   @stop
@section('seo_description')  {{$product->front->seo_description}}@stop
@section('seo_keywords')  {{$product->front->seo_keywords}}@stop

@push("head")
    {!! $product->front->openGraph !!}
    {!! $product->front->schemaOrg !!}
@endpush
@section('content')
    <script>
        window.current_products_id = @json($product->id)
    </script>
    <div class="p-product  ">
        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.products.show','value'=>$product])
        {{--        @include('frontend.global.parts.page_title',['title'=>$product->trans->title])--}}
        <div class="p-product__container container  ">
            @if(Auth::guard('backend')->check())
                {{--                @can('products.edit')--}}
                <div class="col-12">
                    <div class="row py-4">
                        <div class="col-12 ">
                            <a class="btn btn-warning" href="{{route("admin.products.edit",["id"=>$product->id])}}">
                                Редагувати товар </a>
                        </div>
                    </div>
                </div>
                {{--                @endcan--}}
            @endif


            <div class="row">
                <div class="col-lg-7">
                    @include('frontend.products.parts.show.slider')
                </div>
                <div class="col-lg-5">
                    @include('frontend.products.parts.show.short_description')
                </div>
            </div>
        </div>
        <div class="p-product__descriptions-tabs-container">

            @include('frontend.products.parts.show.descriptions_tabs')

        </div>

        @include('frontend.products.parts.show.similar_products',['products'=>$similarProducts])
        @include('frontend.products.parts.show.last_viewed_products',['products'=>\LastViewedProducts::getProducts()])


    </div>

@stop


