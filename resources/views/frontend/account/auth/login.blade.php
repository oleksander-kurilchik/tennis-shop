@extends('layouts.frontend')
@section('seo_title')  @lang('account.login.title') @stop

@section('content')

    <div class="p-auth p-auth-login ">
        @include('frontend.global.parts.breadcrumbs')
        <div class="container">
            <div class="p-auth__form">
                <div class="p-auth-login__form-block">
                    <div class="p-auth-login__form-title">
                        @lang('account.login.title')
                    </div>
                    <form action="{{route('frontend.account.login')}}" method="post">
                        @csrf
                        <div class="p-auth-login__form-row">


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
                                <div class="form-group form-group__default">
                                    <label for=""
                                           class="form-control__label">@lang('account.login.form.password.title')</label>
                                    <input type="password" class="form-control__default" name="password"
                                           placeholder="@lang('account.login.form.password.placeholder')" value="">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback d-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="p-auth-login__form-col">
                                <div class="form-group form-group__default  p-auth-login__form-group-remember">
                                    <div class="form-checkbox-primary p-auth-login__form-group-remember-checkbox">
                                        <input name="remember" class="form-checkbox-primary__input-default"
                                               type="checkbox" value="1"
                                               id="reg-rules-confirmation">
                                        <label class="form-checkbox-primary__label-default p-auth-login__label-remember"
                                               for="reg-rules-confirmation">
                                            @lang('account.login.form.remember_password')
                                        </label>
                                        <a href="{{route('frontend.account.password.request')}}"
                                           class="p-auth-login__link-forget-password">@lang('account.login.form.forget_password')</a>
                                    </div>
                                    @if ($errors->has('remember'))
                                        <span class="invalid-feedback d-block">
                                        <strong>{{ $errors->first('remember') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="p-auth-login__form-col">
                                <div class="form-group  p-auth-login__form-block-submit">
                                    <button type="submit"
                                            class="button-default p-auth-login__form-block-submit-btn">@lang('account.login.login')
                                    </button>
                                </div>
                            </div>

                            <div class="p-auth-login__form-col">
                                <div class="p-auth-login__social-block">
                                    <div class="p-auth-login__social-title">
                                        @lang('account.login.login_with_social')
                                    </div>

                                    <div class="p-auth-login__social-links">
                                        <a href="{{route('frontend.account.auth.social.redirect',['provider'=>'facebook'])}}" class="p-auth-login__social-facebook">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M29.959 15C29.959 6.73768 23.2623 0.0409546 15 0.0409546C6.73774 0.0409546 0.0410156 6.73768 0.0410156 15C0.0410156 22.4672 5.50823 28.6557 12.664 29.7787V19.3278H8.86888V15H12.664V11.7049C12.664 7.95899 14.8935 5.88522 18.3115 5.88522C19.9509 5.88522 21.664 6.1803 21.664 6.1803V9.86063H19.7787C17.9181 9.86063 17.3443 11.0164 17.3443 12.1967V15H21.4918L20.8279 19.3278H17.3443V29.7787C24.4918 28.6557 29.959 22.4672 29.959 15Z"
                                                    fill="#1877F2"/>
                                                <path
                                                    d="M20.8203 19.3279L21.4843 15H17.3367V12.1967C17.3367 11.0164 17.9187 9.86066 19.7712 9.86066H21.6564V6.18034C21.6564 6.18034 19.9433 5.88525 18.304 5.88525C14.8859 5.88525 12.6564 7.95902 12.6564 11.7049V15H8.86133V19.3279H12.6564V29.7787C13.4187 29.9016 14.1974 29.959 14.9925 29.959C15.7876 29.959 16.5662 29.8934 17.3285 29.7787V19.3279H20.8203Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="{{route('frontend.account.auth.social.redirect',['provider'=>'google'])}}" class="p-auth-login__social-google">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.20539 16.9207L5.23075 20.5592L1.66846 20.6346C0.603859 18.66 0 16.4008 0 14C0 11.6785 0.564594 9.4892 1.56537 7.56152H1.56614L4.73758 8.14296L6.12686 11.2954C5.83609 12.1431 5.6776 13.0531 5.6776 14C5.67771 15.0277 5.86387 16.0123 6.20539 16.9207Z"
                                                    fill="#FBBB00"/>
                                                <path
                                                    d="M27.7562 11.3846C27.917 12.2315 28.0008 13.1062 28.0008 14C28.0008 15.0023 27.8954 15.98 27.6947 16.9231C27.0132 20.1323 25.2324 22.9346 22.7655 24.9177L22.7647 24.917L18.7701 24.7131L18.2048 21.1839C19.8417 20.2239 21.1209 18.7216 21.7948 16.9231H14.3086V11.3846H21.904H27.7562Z"
                                                    fill="#518EF8"/>
                                                <path
                                                    d="M22.7633 24.9169L22.7641 24.9177C20.3649 26.8461 17.3172 28 13.9995 28C8.66797 28 4.0326 25.02 1.66797 20.6346L6.2049 16.9208C7.38719 20.0761 10.431 22.3223 13.9995 22.3223C15.5333 22.3223 16.9703 21.9077 18.2033 21.1838L22.7633 24.9169Z"
                                                    fill="#28B446"/>
                                                <path
                                                    d="M22.9352 3.22306L18.3998 6.93612C17.1237 6.13845 15.6152 5.67766 13.9991 5.67766C10.3498 5.67766 7.24905 8.02687 6.12599 11.2954L1.56522 7.56153H1.56445C3.89447 3.06923 8.5883 0 13.9991 0C17.396 0 20.5106 1.21002 22.9352 3.22306Z"
                                                    fill="#F14336"/>
                                            </svg>
                                        </a>

                                    </div>


                                </div>


                            </div>


                            <div class="p-auth-login__form-col-login w-100">
                                <a href="{{route('frontend.account.register')}}"
                                   class="button-default-primary w-100 p-auth-login__register-link">

                                    @lang('account.login.register')
                                </a>

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
