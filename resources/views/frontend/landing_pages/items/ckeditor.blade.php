<div class="landing-page-ckeditor-wrap landing-page-item  landing-page-ckeditor  landing-page-item-{{$item->id}}   {{$item->classes}} ">
    <div class="container">
        <div class="row">
            <div class="col-12 ">

                {!! $item->value !!}
            </div>
        </div>
    </div>
</div>
@include('frontend.landing_pages.items.parts.common')

