@extends('layouts.frontend')
@section('seo_title') @lang('profile.show.title')@stop

@section('seo_description')@lang('profile.show.title')@stop

@section('seo_keywords')@lang('profile.show.title')@stop

@section('content')
    <div class="p-profile  p-profile-info ">

        <div class="p-profile__title-container">
            @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.account.profile.show'])
            @include('frontend.global.parts.page_title',['title'=>trans('profile.show.title')])
        </div>
        <div class="p-profile__menu ">
            <div class="p-profile__menu-container container">
                @include('frontend.account.user.parts.menu',['active'=>'info'])
            </div>
        </div>
        <div class="p-profile__container ">
            <div class="p-profile__content container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="b-profile-card">
                            <div class="b-profile-card__title">@lang('profile.show.title_form')</div>
                            <div class="b-profile-card__list">
                                <div class="b-profile-card__item">
                                    <div class="b-profile-card__item-title">@lang('profile.show.last_name')</div>
                                    <div class="b-profile-card__item-value"> {{$user->last_name}} </div>
                                </div>
                                <div class="b-profile-card__item">
                                    <div class="b-profile-card__item-title">@lang('profile.show.first_name')   </div>

                                    <div class="b-profile-card__item-value">{{$user->first_name}} </div>

                                </div>
                                <div class="b-profile-card__item">
                                    <div class="b-profile-card__item-title">@lang('profile.show.phone')</div>
                                    <div class="b-profile-card__item-value">{{$user->phone}} </div>
                                </div>
                                <div class="b-profile-card__item">
                                    <div class="b-profile-card__item-title">Email</div>
                                    <div class="b-profile-card__item-value">{{$user->email}} </div>
                                </div>


                                <div class="b-profile-card__item b-profile-card__item-change-password">
                                    <a href="{{route('frontend.account.profile.change-password')}}"
                                       class="b-profile-card__item-title">
                                        @lang('profile.show.change_password')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-profile-info__edit">
                            <a href="{{route('frontend.account.profile.edit')}}"
                               class="button-default p-profile-info__edit-btn">
                                @lang('profile.show.edit')

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


