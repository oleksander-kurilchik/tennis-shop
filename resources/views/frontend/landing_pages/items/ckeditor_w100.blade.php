    <div class="container-fluid landing-page-item  landing-page-ckeditor-w100  landing-page-item-{{$item->id}}   {{$item->classes}} ">
        <div class="row no-gutters">
            <div class="col-12 ">

                {!! $item->value !!}
            </div>
        </div>

    </div>

@include('frontend.landing_pages.items.parts.common')
