@extends('layouts.frontend')

@section('content')
    <div class="p-page  ">
        @include('frontend.global.parts.breadcrumbs')
        @include('frontend.global.parts.page_title')
        <div class="p-page__content  ">
            <div class="p-page__content-block container">
                <div class="p-page__content-description">


                </div>
            </div>
        </div>
    </div>

@stop
@push('scripts_list')
    <script>
        $(document).ready(function () {
            $('#cart_message').modal('show')
            // $('#exampleModal').modal('show')
        });
    </script>

@endpush

