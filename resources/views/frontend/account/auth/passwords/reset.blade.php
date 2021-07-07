@extends('layouts.frontend')
@section('seo_title')  @lang('account.reset.title') @stop
@section('content')

    <div class="p-auth p-auth-login ">
        @include('frontend.global.parts.breadcrumbs')
        <div class="container">
            <div class="p-auth__form">
                <div class="p-auth-login__form-block">
                    <div class="p-auth-login__form-title">
                        {{ __('Reset Password') }}
                    </div>
                    <form action="{{ route('frontend.account.password.request') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
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
                                    <input type="email" class="form-control__default" name="email" placeholder="Email"
                                           value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback d-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="p-auth-login__form-col">
                                <div class="form-group form-group__default">
                                    <label for=""
                                           class="form-control__label">@lang('Password') </label>
                                    <input type="password" class="form-control__default" name="password" required autocomplete="new-password">

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="p-auth-login__form-col">
                                <div class="form-group form-group__default">
                                    <label for=""
                                           class="form-control__label">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control__default" name="password_confirmation"
                                         required autocomplete="new-password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback d-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="p-auth-login__form-col">
                                <div class="form-group  p-auth-login__form-block-submit">
                                    <button type="submit"
                                            class="button-default p-auth-login__form-block-submit-btn">
                                        {{ __('Reset Password') }}
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
