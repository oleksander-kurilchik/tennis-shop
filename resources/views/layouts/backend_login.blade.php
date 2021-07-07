<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"  >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Адмін панель  @section("sub_title") @show  - !!!!!!!! </title>

    {!! Html::style('/service-resourse/css/app.css') !!}
    @stack('style')
    <style>
        html,body{
            height: 100%;
        }
        body{
            height: 100%;
            background-image: url('/service-resourse/images/login_form/background.png');
            background-position: center;background-repeat: no-repeat;background-size: contain
        }
    </style>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token()
        ]) !!};
    </script>
    <script type="text/javascript" src="{{ asset('/service-resourse/js/jquery-3.3.1.min.js')}}"></script>
     <script type="text/javascript" src="{{ asset('/service-resourse/package/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body >
    <div class="container-fluid h-100">
        <div class="row  justify-content-center align-items-center h-100 ">
            <div class="col-sm-6 ">
                @yield('content')
            </div>
        </div>
    </div>
@stack('scripts')
</body>
</html>
