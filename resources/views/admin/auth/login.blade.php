@extends('layouts.backend_login')


@section('content')

    <div class="card  admin-login-card">
        <div class="card-header  admin-login-card__header">
            <img src="/service-resourse/images/login_form/logo.png" alt="" class="img-fluid">
        </div>
        <div class="card-body  admin-login-card__body">
            <form  class="admin-login-form" method="POST" action="{{route('admin.auth.login')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group  ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><img class="img-fluid" src="/service-resourse/images/login_form/email.png" alt=""></span>
                        </div>
                        <input id="email" type="email" class="form-control admin-login-form__input {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                            placeholder="Email"   required autofocus>
                        <hr class="admin-login-form__input-underline">
                        {!! $errors->first('email', ' <div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-group">

                    <div class="input-group  ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><img class="img-fluid" src="/service-resourse/images/login_form/password.png" alt=""></span>
                        </div>
                        <input id="password" type="password" class="form-control admin-login-form__input {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value=""
                         placeholder="Пароль"      required autofocus>
                        <hr class="admin-login-form__input-underline">
                        {!! $errors->first('password', ' <div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>


                <div class="form-group">
                <div class=" ">
                <div class="checkbox">
                <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Запамятати мене
                </label>
                </div>
                </div>
                </div>

                <div class="form-group mb-0">
                    <div class="w-100 text-center">
                        <button type="submit" class="btn admin-login-form__submit">
                            Увійти
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
