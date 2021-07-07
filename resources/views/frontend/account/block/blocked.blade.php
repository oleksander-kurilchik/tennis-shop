@extends('layouts.frontend')
@section('seo_title') @lang('blocking.blocked.title') @stop

@section('content')

    <div class="p-auth p-auth-login container">
        <div class="p-auth__logo">
            <img src="/images/auth/logo.svg" alt="" class="p-auth__logo-img">
        </div>
        <div class="p-auth__title">

            @lang('blocking.blocked.title')
        </div>
        <div class="p-auth__description">
            <div class="p-auth__description-content">
                <div class="alert alert-success" role="alert">
                    @lang('blocking.blocked.description')
                 </div>
            </div>
        </div>

        <div class="p-auth__form">
            <div class="p-auth__form-block ">
                <div class="verification-form-logout">
                    <form action="{{route("frontend.account.logout")}}" method="POST">
                        @csrf
                        <button type="submit" class="btn  button-default w-100 ">
                            @lang('blocking.blocked.logout')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
