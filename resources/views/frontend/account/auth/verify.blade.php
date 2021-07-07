@extends('layouts.frontend')
@section('seo_title')  {{ __('Проверьте Ваш E-mail') }} @stop
@section('content')

    <div class="p-auth ">
        @include('frontend.global.parts.breadcrumbs')
        <div class="container">
            <div class="p-auth__form">
                <div class="p-auth__form-block pb-4">
                    <div class="p-auth__form-title">
                        {{ __('Проверьте Ваш E-mail') }}
                    </div>


                    <div class="p-auth__form-row">


                        <div class="p-auth__form-col">
                            @if (session('resent'))
                                <div class="alert alert-danger" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            <div class="alert alert-success" role="alert">
                                <form class="d-inline" method="POST"
                                      action="{{ route('frontend.account.verification.resend') }}">
                                    @csrf

                                        {{ __('Before proceeding, please check your email for a verification link.') }}


                                        {{ __('If you did not receive the email') }}

                                    <a class="account-verify__link-resend alert-link" onclick="this.closest('form').submit();return false;" href="#">{{ __('click here to request another') }}</a>.

                                </form>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
