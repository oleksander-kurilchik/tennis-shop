@extends('layouts.frontend')
@section('seo_title')  @lang('account.register.title') @stop
@section('content')

    <div class="p-auth p-auth-login ">
        @include('frontend.global.parts.breadcrumbs')
        <div class="container">
            <div class="p-auth__form">
                <div class="p-auth-login__form-block">
                    <div class="p-auth-login__form-title">
                        Завершення реєстрації
                    </div>
                    <div class="card account-card">
                        <div class="card-header account-card__header">Регистрация завершена</div>

                        <div class="card-body account-card__body">
                            Проверьте свой адрес электронной почты.<br>
                            Пожалуйста, проверьте свою электронную почту
                            для подтверждения регистрации.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
