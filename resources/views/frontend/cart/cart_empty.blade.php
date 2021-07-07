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

                <div class="p-cart__content-empty col-12">
                    <div class="p-cart__message-block">
                        <div class="p-cart__message-block-icon">
                            <svg   width="99" version="1.1"  x="0" y="0" viewBox="0 0 496 496" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m456 176h-168v-136c0-22.054688-17.945312-40-40-40s-40 17.945312-40 40v136h-168c-22.054688 0-40 17.945312-40 40 0 19.3125 13.769531 35.472656 32 39.191406v200.808594c0 22.054688 17.945312 40 40 40h352c22.054688 0 40-17.945312 40-40v-200.808594c18.230469-3.71875 32-19.871094 32-39.191406 0-22.054688-17.945312-40-40-40zm-232-136c0-13.230469 10.769531-24 24-24s24 10.769531 24 24v160c0 13.230469-10.769531 24-24 24s-24-10.769531-24-24zm200 440h-352c-13.230469 0-24-10.769531-24-24v-200h400v200c0 13.230469-10.769531 24-24 24zm32-240h-416c-13.230469 0-24-10.769531-24-24s10.769531-24 24-24h168v8c0 22.054688 17.945312 40 40 40s40-17.945312 40-40v-8h168c13.230469 0 24 10.769531 24 24s-10.769531 24-24 24zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m192 288c-17.648438 0-32 14.351562-32 32v96c0 17.648438 14.351562 32 32 32s32-14.351562 32-32v-96c0-17.648438-14.351562-32-32-32zm16 128c0 8.824219-7.175781 16-16 16s-16-7.175781-16-16v-96c0-8.824219 7.175781-16 16-16s16 7.175781 16 16zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m112 288c-17.648438 0-32 14.351562-32 32v96c0 17.648438 14.351562 32 32 32s32-14.351562 32-32v-96c0-17.648438-14.351562-32-32-32zm16 128c0 8.824219-7.175781 16-16 16s-16-7.175781-16-16v-96c0-8.824219 7.175781-16 16-16s16 7.175781 16 16zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m304 288c-17.648438 0-32 14.351562-32 32v96c0 17.648438 14.351562 32 32 32s32-14.351562 32-32v-96c0-17.648438-14.351562-32-32-32zm16 128c0 8.824219-7.175781 16-16 16s-16-7.175781-16-16v-96c0-8.824219 7.175781-16 16-16s16 7.175781 16 16zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m384 288c-17.648438 0-32 14.351562-32 32v96c0 17.648438 14.351562 32 32 32s32-14.351562 32-32v-96c0-17.648438-14.351562-32-32-32zm16 128c0 8.824219-7.175781 16-16 16s-16-7.175781-16-16v-96c0-8.824219 7.175781-16 16-16s16 7.175781 16 16zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m240 192h16v16h-16zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m416 160c44.113281 0 80-35.886719 80-80s-35.886719-80-80-80-80 35.886719-80 80 35.886719 80 80 80zm0-144c35.289062 0 64 28.710938 64 64s-28.710938 64-64 64-64-28.710938-64-64 28.710938-64 64-64zm0 0" fill="#e23a3a" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m368 72h96v16h-96zm0 0" fill="#e23a3a" data-original="#000000" style=""/></g></svg>
                        </div>
                        <div class="p-cart__message-block-title">
                           @lang('cart.empty.title')
                        </div>

                        <div class="p-cart__message-block-description pb-0">
                            @lang('cart.empty.description')
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@stop

