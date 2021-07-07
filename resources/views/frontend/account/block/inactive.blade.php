@extends('layouts.frontend')


@section('content')

    <div class="p-auth p-auth-login container">
        <div class="p-auth__logo">
            <img src="/images/auth/logo.svg" alt="" class="p-auth__logo-img">
        </div>
        <div class="p-auth__title">
            Даний користувач не активний
        </div>
        <div class="p-auth__description">
            <div class="p-auth__description-content">



                        <div class="alert alert-success" role="alert">
                         Даний користувач не активний, почекайте будьласка поки менеджер звяжеться з вами для активації вашого особистого кабінету
                        </div>
            </div>
        </div>

        <div class="p-auth__form">
            <div class="p-auth__form-block d-none">
                <div class="verification-form-logout">
                    <form action="{{route("frontend.account.logout")}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link account-verify__link-logout  ">
                            Выйти из личного кабинета
                        </button>
                    </form>
                </div>


            </div>


        </div>


    </div>

@stop
