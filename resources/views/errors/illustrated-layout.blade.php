<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link media="all" type="text/css" rel="stylesheet" href="/css/app.css">

</head>
<body>
<div class="page-errors-container container-fluid">
    <div class="row row-error-content">
        <div class="col-md-6 first-column align-self-stretch">
            <div class="logo-wrap">
                <img src="/images/error/logo.svg" alt="" class="logo logo-image">
            </div>

            <div class="error-code">
                @yield('code', __('Oh no'))
            </div>


                <div class="error-message">
                    @yield('message')
                </div>

                <div class="text-sm-down-center">
                    <a href="{{ url('/') }}" class="button-go-home  ">
                        <span>{{ __('errors.go_home') }}</span>
                    </a>
                </div>

        </div>


        <div class="col-md-6 second-column ">
            <div class="background-404-image-left">
            </div>
        </div>
    </div>
</div>
</body>
</html>
