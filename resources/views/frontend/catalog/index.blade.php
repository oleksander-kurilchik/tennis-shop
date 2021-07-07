@extends('layouts.frontend')

@section('seo_title') {{$category->front->seo_title}}   @stop
@section('seo_description')  {{$category->front->seo_description}}@stop
@section('seo_keywords')  {{$category->front->seo_keywords}}@stop

@push("head")
    {!! $category->front->openGraph !!}
@endpush


@section('content')
    <div class="p-catalog">

        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.categories.show','value'=>$category])
{{--        @include('frontend.global.parts.page_title')--}}

        <div class="b-page-title ">
            <div class="b-page-title__container container">
                <div class="row">
                    <div class="col-auto">
                        <h1 class="b-page-title__title p-catalog__title">
                            {{$category->trans->title}}
                        </h1>
                    </div>
                    <div class="col-auto ml-auto d-none d-lg-block">
                        <div class="d-flex align-items-center">
                            <div class="p-catalog__select-sorting-title">
                                @lang('category.sorting.title')
                            </div>
                            <div class="p-catalog__select-sorting-wrap">
                                <select class="form-control__default p-catalog__select-sorting js-p-catalog__select-sorting" autocomplete="off"
                                    data-placeholder="@lang('category.sorting.select')"
                            >
                                <option></option>
                                    <option data-type="price-asc" value="{{Request::fullUrlWithQuery(['sorting' => 'price-asc'])}}"
                                        {{ Request::get('sorting') == 'price-asc'?' selected ':''}}
                                    >@lang('category.sorting.cheaper')</option>
                                    <option data-type="price-desc" value="{{Request::fullUrlWithQuery(['sorting' => 'price-desc'])}}"
                                        {{ Request::get('sorting') == 'price-desc'?' selected ':''}}
                                    >@lang('category.sorting.expensive')</option>
                                    <option data-type="top" value="{{Request::fullUrlWithQuery(['sorting' => 'top'])}}"
                                        {{ Request::get('sorting') == 'top'?' selected ':''}}
                                    >@lang('category.sorting.top')</option>
                                    <option data-type="new" value="{{Request::fullUrlWithQuery(['sorting' => 'new'])}}"
                                        {{ Request::get('sorting') == 'new'?' selected ':''}}
                                    >@lang('category.sorting.new')</option>
                                    <option data-type="sale" value="{{Request::fullUrlWithQuery(['sorting' => 'sale'])}}"
                                        {{ Request::get('sorting') == 'sale'?' selected ':''}}
                                    >@lang('category.sorting.sale')</option>
                            </select>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        @include('frontend.catalog.parts.mobile_sorting_filter')




        @if($tagCollection->isNotEmpty())
        <div class="p-catalog__filters-tags">
            <div class="p-catalog__filters-tags-container container">
                @include('frontend.catalog.parts.filters_tags')
            </div>
        </div>
        @endif

        <div class="  p-catalog__container container pt-4">
            <div class="row">
                <div class="  col-lg-8 col-xxl-9" >
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6 pb-20">
                                @include('frontend.global.parts.product_item', ['product'=>$product])
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class=" col-lg-4 col-xxl-3">
                    @include('frontend.catalog.parts.filters_block')

                </div>
                <div class="col-12">
                    {!! $products->appends(request()->except('page'))->links() !!}
                 </div>
            </div>
        </div>
        @include('frontend.catalog.parts.slider_viewed',['products'=>\LastViewedProducts::getProducts()])
    </div>
@stop
