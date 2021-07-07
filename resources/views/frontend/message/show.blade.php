@extends('layouts.frontend')

@section('seo_title') @lang('message.title')@stop

@section('seo_description')@lang('message.title')@stop

@section('seo_keywords')@lang('message.title')@stop


@section('content')
    <div class="p-message  " >
        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.message'])
        @include('frontend.global.parts.page_title',['title'=>trans('message.title')])
        <div class="p-message__content  container "  >
            <div class="row">
                <div class="col-12 pt-3 pb-5">
                <div class="b-message-block ">
                    <div class="b-message-block__icon">

                        <svg version="1.1"  x="0px" y="0px" width="100"  fill="#ba1e1e"
                             viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
<g>
    <path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z
		 M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z"/>
    <path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991
		c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z"/>
    <path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z
		"/>
</g>

</svg>

                    </div>
                    <div class="b-message-block__title">
                        {{$message['title']}}
                    </div>
                    <div class="b-message-block__description pb-0">
                        {{$message['description']}}
                    </div>

                </div>
            </div>

            </div>
        </div>
    </div>

@stop

