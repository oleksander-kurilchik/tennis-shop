<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('frontend.global.head')

<body class=" @yield('layout_body_class')">
@include('frontend.global.header')
@include('frontend.global.parts_header.message')

@section('content')@show
@include('frontend.global.footer')
@include('frontend.global.modal')
@include('frontend.global.mobile_menu')

{!! Html::script(mix('/js/app.js')) !!}
@stack("scripts_list")
</body>
</html>
