@extends('layouts.frontend')
 @section('seo_title') @lang('search.title')   @stop








@section('content')
    <div class="  p-page-search">

        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.products.search'])
        @include('frontend.global.parts.page_title',['title'=>trans('search.title') ])

        <div class="p-page-search__content">
            <div class="  p-page-search__container container  ">
                <div class="row">
                    <div class="col-12 ">
                        @include('frontend.products.parts.search.search_form')
                    </div>

                    @if($products->isNotEmpty())
                        <div class="col-12">
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
                    @endif
                    @if($products->isEmpty())
                        <div class="p-page-search__empty-block-wrap col-12">
                            <div class="b-message-block ">
                                <div class="b-message-block__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg"  version="1.1" width="100"   x="0" y="0" viewBox="0 0 512.00037 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"><path d="m248.953125 61.273438c-5.367187-1.238282-10.722656 2.101562-11.964844 7.46875-1.242187 5.367187 2.105469 10.726562 7.472657 11.96875 24.8125 5.734374 47.492187 18.332031 65.582031 36.421874 53.183593 53.183594 53.183593 139.726563 0 192.910157-53.183594 53.1875-139.726563 53.1875-192.910157 0-53.1875-53.183594-53.1875-139.726563 0-192.910157 15.269532-15.269531 33.339844-26.40625 53.710938-33.109374 5.230469-1.71875 8.078125-7.355469 6.359375-12.589844-1.722656-5.234375-7.363281-8.082032-12.59375-6.359375-23.367187 7.683593-44.085937 20.453125-61.582031 37.953125-60.964844 60.964844-60.964844 160.160156 0 221.125 30.480468 30.480468 70.519531 45.722656 110.5625 45.722656 40.039062-.003906 80.078125-15.242188 110.5625-45.722656 60.960937-60.964844 60.960937-160.160156 0-221.125-20.738282-20.734375-46.738282-35.175782-75.199219-41.753906zm0 0" fill="#da0505" data-original="#000000" style="" class=""/><path d="m498.414062 432.707031-104.53125-104.53125c53.601563-84.054687 41.863282-194.484375-29.265624-265.617187-40.339844-40.339844-93.976563-62.558594-151.027344-62.558594-57.054688 0-110.691406 22.21875-151.03125 62.558594-40.34375 40.339844-62.558594 93.976562-62.558594 151.03125 0 57.050781 22.214844 110.6875 62.558594 151.027344 40.339844 40.339843 93.972656 62.554687 151.023437 62.554687 40.945313 0 80.386719-11.484375 114.59375-33.289063l104.53125 104.53125c8.746094 8.75 20.414063 13.566407 32.855469 13.566407 12.4375 0 24.105469-4.816407 32.855469-13.566407 18.109375-18.117187 18.109375-47.589843-.003907-65.707031zm-14.105468 51.601563c-4.980469 4.976562-11.636719 7.71875-18.746094 7.71875-7.113281 0-13.769531-2.742188-18.75-7.71875l-110.304688-110.304688c-1.929687-1.933594-4.484374-2.921875-7.054687-2.921875-1.976563 0-3.960937.582031-5.683594 1.777344-32.410156 22.480469-70.515625 34.363281-110.1875 34.363281-51.722656 0-100.347656-20.140625-136.917969-56.710937-75.5-75.5-75.5-198.347657 0-273.847657 36.574219-36.574218 85.199219-56.714843 136.925782-56.714843 51.722656 0 100.347656 20.140625 136.921875 56.714843 66.28125 66.285157 75.683593 170.207032 22.347656 247.105469-2.75 3.964844-2.269531 9.324219 1.144531 12.738281l110.304688 110.304688c10.335937 10.335938 10.335937 27.15625 0 37.496094zm0 0" fill="#da0505" data-original="#000000" style="" class=""/><path d="m273.804688 153.371094c-3.894532-3.894532-10.207032-3.894532-14.105469 0l-46.109375 46.109375-46.113282-46.109375c-3.894531-3.894532-10.210937-3.894532-14.105468 0-3.894532 3.894531-3.894532 10.210937 0 14.105468l46.109375 46.113282-46.109375 46.109375c-3.894532 3.894531-3.894532 10.210937 0 14.105469 1.945312 1.949218 4.5 2.921874 7.050781 2.921874 2.554687 0 5.105469-.972656 7.054687-2.921874l46.109376-46.109376 46.109374 46.109376c1.949219 1.949218 4.503907 2.921874 7.054688 2.921874 2.554688 0 5.105469-.972656 7.054688-2.921874 3.894531-3.894532 3.894531-10.210938 0-14.105469l-46.113282-46.109375 46.113282-46.113282c3.894531-3.894531 3.894531-10.210937 0-14.105468zm0 0" fill="#da0505" data-original="#000000" style="" class=""/><path d="m206.976562 77.328125c5.492188 0 9.972657-4.480469 9.972657-9.976563 0-5.492187-4.480469-9.972656-9.972657-9.972656-5.496093 0-9.976562 4.480469-9.976562 9.972656 0 5.496094 4.480469 9.976563 9.976562 9.976563zm0 0" fill="#da0505" data-original="#000000" style="" class=""/></g></g></svg>


                                </div>
                                <div class="b-message-block__title">
                                    @lang('search.empty_title')
                                </div>
                                <div class="b-message-block__description pb-0">
                                    @lang('search.empty_message')
                                </div>

                            </div>
                        </div>
                    @endif



                </div>
            </div>
        </div>

        @include('frontend.catalog.parts.slider_viewed',['products'=>\LastViewedProducts::getProducts()])
    </div>
@stop












{{--@include('frontend.global.breadcrumbs',['name'=>"frontend.products.search" ])--}}
@section('content')

     <div class="p-page-search container">
        <div class="p-page-search__title-block  d-flex flex-wrap justify-content-between ">
            <div class="p-page-search__title">@lang('search.title')</div>

        </div>
        <div class="p-page-search__body row">

                <div class="col-12 ">
                    <form  class="p-page-search__search-form pb-4" action="{{route("frontend.products.search")}}">
                        <div class="input-group p-page-search__search-form-input-group" >
                            <input type="text" class=" form-control__default " placeholder="@lang('search.search')"   name="search"  value="{{Request::get("search")}}" inputmode="search"  >
                            <div class="input-group-append p-page-search__search-form-append">
                                <button class="button-default p-page-search__search-form-submit" type="submit" >
                                    <svg class="p-page-search__search-form-image-submit" width="20" height="20" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
                                        <g>
                                            <g>
                                                <path d="M8.56929,2.10526c3.35062,0 6.07643,2.67579 6.07643,5.96491c0,3.28913 -2.72581,5.96491 -6.07643,5.96491c-3.35062,0 -6.07643,-2.67578 -6.07643,-5.96491c0,-3.28912 2.72581,-5.96491 6.07643,-5.96491zM19.69357,18.20596l-4.84214,-4.94771c1.245,-1.45404 1.92714,-3.28351 1.92714,-5.18807c0,-4.44983 -3.685,-8.07018 -8.21428,-8.07018c-4.52929,0 -8.21429,3.62035 -8.21429,8.07018c0,4.44982 3.685,8.07017 8.21429,8.07017c1.70035,0 3.32071,-0.50386 4.70607,-1.46035l4.87893,4.98526c0.20392,0.20807 0.47821,0.32281 0.77214,0.32281c0.27821,0 0.54214,-0.10421 0.7425,-0.29368c0.42571,-0.40246 0.43928,-1.06983 0.02964,-1.48843z" fill="#000000" fill-opacity="1"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>



            @if($products->isEmpty())
                <div class="p-page-search__empty-block-wrap col-12">
                    <div class="p-page-search__empty-block ">
                        <div class="p-page-search__empty-block-title">
                            @lang('search.empty_title')
                        </div>
                        <div class="p-page-search__empty-block-description">
                            @lang('search.empty_message')
                        </div>

                    </div>
                </div>
            @endif


        </div>
    </div>

@stop
