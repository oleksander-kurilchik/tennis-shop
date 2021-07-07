@extends('layouts.frontend')
@include('frontend.landing_pages.parts.seo',['page'=>$page])

@section('content')
    <div class="p-page p-page-contacts">
        @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.landing_pages.show','value'=>$page])
        @include('frontend.global.parts.page_title',['title'=>$page->trans->title])
        <div class="p-page__content p-page-contacts__content">
            <div class="p-page-contacts__container container pb-5 ">
                <div class="row">
                    <div class="col-lg-7 col-xxl-8">
                        <div class="p-page-contacts__map-block">

                            @include('frontend.landing_pages.parts.contacts.contact-info')

                            <div class="p-page-contacts__map " style="height: 340px" id="p-page-contacts__map">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xxl-4 pt-5 pt-lg-0">
                        @include('frontend.landing_pages.parts.contacts.feedback')
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts_list')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjkkhR82IBiPEASoU5PqPu0OwzqIqZZeI&callback=initMap&libraries=&v=weekly"
        defer
    >

    </script>
    <script>
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("p-page-contacts__map"), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }

    </script>


@endpush
