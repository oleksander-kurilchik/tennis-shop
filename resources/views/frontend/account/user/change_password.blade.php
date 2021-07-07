@extends('layouts.frontend')
@section('seo_title') @lang('profile.change-password.title')  @stop



@section('content')

    <div class="p-profile p-profile-change-password ">
        <div class="p-profile__title-container">
            @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.account.profile.change-password'])
            @include('frontend.global.parts.page_title',['title'=>trans('profile.change-password.title')])
        </div>
        <div class="p-profile__menu ">
            <div class="p-profile__menu-container container">
                @include('frontend.account.user.parts.menu',['active'=>'info'])
            </div>
        </div>

        <div class="p-profile__container ">
            <div class="p-profile__content container">
                <div class="p-profile-change-password__content-block">


                    <form action="{{route('frontend.account.profile.change-password')}}" method="post" class="p-profile-change-password__form">
                        @csrf
                        <div class="p-profile-change-password__form-row row">
                            <div class="p-profile-change-password__form-col col-lg-6  ">
                                <div class="form-group form-group__default">
                                    <label for="exampleInputEmail1"
                                           class="form-control__label"> @lang('profile.change-password.form.old_password.title')</label>
                                    <input type="password" class="form-control form-control__default js-password-input"
                                           placeholder="@lang('profile.change-password.form.old_password.placeholder')"
                                           name="old_password">
                                    {!! $errors->first('old_password', ' <div class="invalid-feedback d-block"> :message </div>') !!}
                                </div>


                            </div>
                            <div class="w-100"></div>

                            <div class="p-profile-change-password__form-col col-lg-6">
                                <div class="form-group form-group__default">
                                    <label for="exampleInputEmail1"
                                           class="form-control__label">@lang('profile.change-password.form.password.title')</label>
                                    <input type="password" class="form-control__default"
                                           placeholder="@lang('profile.change-password.form.password.placeholder')"
                                           name="password">
                                    {!! $errors->first('password', ' <div class="invalid-feedback d-block"> :message </div>') !!}
                                </div>

                            </div>


                            <div class="p-profile-change-password__form-col col-lg-6">
                                <div class="form-group form-group__default">
                                    <label for="exampleInputEmail1" class="form-control__label">
                                        @lang('profile.change-password.form.password_confirmation.title')
                                    </label>
                                    <input type="password" class="form-control__default"
                                           placeholder="@lang('profile.change-password.form.password_confirmation.placeholder')"
                                           name="password_confirmation">
                                    {!! $errors->first('password_confirmation', ' <div class="invalid-feedback d-block"> :message </div>') !!}
                                </div>
                            </div>

                            <div class="p-profile-change-password__form-col-100 col-12">
                                <div class="p-profile-change-password__form-submit-wrap">
                                    <button type="submit" class="button-default p-profile-change-password__form-submit">
                                        @lang('profile.change-password.form.update_password')
                                    </button>
                                </div>
                                <div class="p-profile-change-password__cancel-wrap">
                                    <a href="{{route('frontend.account.profile.show')}}"
                                       class="p-profile-change-password__form-block-cancel-btn button-default-primary">
                                        @lang('profile.change-password.form.cancel')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop


