@extends('layouts.frontend')
@include('frontend.landing_pages.parts.seo',['page'=>$page])

@section('content')
    <div class="p-page  ">

        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.landing_pages.show','value'=>$page])
        @include('frontend.global.parts.page_title',['title'=>$page->trans->title])
            @include('frontend.landing_pages.parts.admin-edit-button')

            <div class="p-page__content-block container">
                <div class="p-page__content-description">
                    {!! $page->trans->description !!}
                </div>
            </div>
            @foreach($page->items as $item)
                {!! $item->render() !!}
            @endforeach
        </div>
    </div>

@stop

