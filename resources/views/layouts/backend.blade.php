<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Адмін панель @section("sub_title") @show - !!!!!!!!!!! </title>
    @include('admin.global.head_scripts_and_styles')
</head>
<body>
<div id="app">
    <div class="container-fluid ">
        @section('navbar')
            @include('admin.navbar')
        @show
    </div>
    <div class="container-fluid admin-content-wrap " id="admin-content-wrap">

        <div class="row" style="position: relative">
            <div class="col-md-3  p-0 sidebar-admin-wrap transition-style">
                @section('sidebar')
                    @include('admin.sidebar')
                @show
            </div>
            <div class="col-md-9 transition-style admin-content-wrap pt-3">
                @section('admin-breadcrumbs')
                    @php
                        try {
                            if(!isset($_breadcrumb)){$_breadcrumb =  'admin.index';}
                            echo Breadcrumbs::render($_breadcrumb,$_breadcrumbValue) ;
                        } catch (\Exception $e) {
                                   // throw $e;
                        }
                    @endphp

                @show
                @yield('content')
            </div>
        </div>
    </div>


</div>
@include('admin.footer')
@stack('scripts')
@include("admin.global.footer_scripts")
@include("admin.global.image_url_popup")

<style>
    html{
        height: 100%;
    }
    body{
        min-height: 100%;
        position: relative;
        padding-bottom: 110px;
    }
    .admin-footer{
        position: absolute;
        bottom: 0;
        width: 100%;
        left: 0;
    }
    .breadcrumb{
        font-size: 12px;
    }
</style>

</body>

</html>
