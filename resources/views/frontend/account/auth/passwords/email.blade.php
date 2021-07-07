@extends('layouts.frontend')
@section('seo_title') {{ __('Reset Password') }} @stop
@section('content')

    <div class="p-auth p-auth-login ">
        @include('frontend.global.parts.breadcrumbs')
        <div class="container">
            <div class="p-auth__form">
                <div class="p-auth-login__form-block">
                    <div class="p-auth-login__form-title">
                        {{ __('Reset Password') }}
                    </div>
                    <form action="{{ route('frontend.account.password.email') }}" method="post">
                        @csrf
                        <div class="p-auth-login__form-row">
                            @if (session('status'))
                                <div class="p-auth-login__form-col">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            @endif

                            <div class="p-auth-login__form-col">
                                <div class="form-group form-group__default">
                                    <label for=""
                                           class="form-control__label">Email</label>
                                    <input type="email" class="form-control__default" name="email"
                                           placeholder="Email"
                                           value="{{ old('email') }}"
                                    >
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback d-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>


                            <div class="p-auth-login__form-col">
                                <div class="form-group  p-auth-login__form-block-submit">
                                    <button type="submit"
                                            class="button-default p-auth-login__form-block-submit-btn">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>


                            <div class="p-auth-login__form-col-login w-100">
                                <a href="{{route('frontend.account.login')}}"
                                   class="button-default-primary w-100 p-auth-login__register-link">
                                    @lang('account.password.reset.back')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
