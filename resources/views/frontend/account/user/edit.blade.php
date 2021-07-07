@extends('layouts.frontend')
@section('seo_title') @lang('profile.edit.title')  @stop



@section('content')

    <div class="p-profile p-profile-edit-data ">
        <div class="p-profile__title-container">
            @include('frontend.global.parts.breadcrumbs',['name'=>'frontend.account.profile.edit'])
            @include('frontend.global.parts.page_title',['title'=>trans('profile.edit.title')])
        </div>
        <div class="p-profile__menu ">
            <div class="p-profile__menu-container container">
                @include('frontend.account.user.parts.menu',['active'=>'info'])
            </div>
        </div>

        <div class="p-profile__container ">
            <div class="p-profile__content container">
                <div class="p-profile-edit-data__content-block">

                    {!! Form::model($user, [
                          'method' => 'POST',
                          'url' => route('frontend.account.profile.edit'),
                          'class' => 'p-account-edit-data__form',
                          'files' => false
                      ]) !!}

                    <div class="p-profile-edit-data__form-row">
                        <div class="p-profile-edit-data__form-col">
                            <div class="form-group form-group__default">
                                {!! Form::label('last_name', trans('profile.edit.form.last_name.title'),
                                    ['class' => 'form-control__label']) !!}
                                {!! Form::text('last_name',null, ['autocomplete'=>'off', 'class' => 'form-control__default' ,'placeholder'=>trans('profile.edit.form.last_name.placeholder')] ) !!}
                                {!! $errors->first('last_name', ' <div class="invalid-feedback d-block"> :message </div>') !!}

                            </div>
                        </div>

                        <div class="p-profile-edit-data__form-col">
                            <div class="form-group form-group__default">
                                {!! Form::label('first_name', trans('profile.edit.form.first_name.title'), ['class' => 'form-control__label']) !!}
                                {!! Form::text('first_name',null, ['autocomplete'=>'off', 'class' => 'form-control__default','placeholder'=>trans('profile.edit.form.first_name.placeholder')] ) !!}
                                {!! $errors->first('first_name', ' <div class="invalid-feedback d-block"> :message </div>') !!}

                            </div>
                        </div>

                        <div class="p-profile-edit-data__form-col">
                            <div class="form-group form-group__default">
                                {!! Form::label('phone', trans('profile.edit.form.phone.title'), ['class' => 'form-control__label']) !!}
                                {!! Form::text('phone',null, ['autocomplete'=>'off', 'class' => 'form-control__default','placeholder'=>trans('profile.edit.form.phone.placeholder')] ) !!}
                                {!! $errors->first('phone', ' <div class="invalid-feedback d-block"> :message </div>') !!}


                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="p-profile-edit-data__form-col-100">
                            <div class="p-profile-edit-data__form-submit-wrap">
                                <button type="submit" class="button-default p-profile-edit-data__form-submit">
                                    @lang('profile.edit.form.save')
                                </button>
                            </div>
                            <div class="p-profile-edit-data__cancel-wrap">
                                <a href="{{route('frontend.account.profile.show')}}"
                                   class="p-profile-edit-data__form-block-cancel-btn button-default-primary">
                                    @lang('profile.edit.form.cancel')
                                </a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop



