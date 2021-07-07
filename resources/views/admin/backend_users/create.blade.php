@extends('layouts.backend')


@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Адміністративний доступ  @endsection


@section('content')

    <div class="card">
        <div class="card-header">Створити нового користувача</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_users.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.backend_users.store"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Имя', ['class' => ' ' ,"for"=>"name"]) !!}
                <div class=" ">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => ' ' ,"for"=>"email"]) !!}
                <div class=" ">
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('email', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
{{--            <div class="form-group {{ $errors->has('user_type') ? 'has-error' : ''}}">--}}
{{--                {!! Form::label('user_type', 'Тип користувача', ['class' => ' ' ,"for"=>"email"]) !!}--}}
{{--                <div class=" ">--}}
{{--                    {!! Form::select('user_type', ['admin' => 'Адміністратор', 'manager' => 'Менеджер'], null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
{{--                    {!! $errors->first('user_type', '<p class="invalid-feedback d-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                {!! Form::label('phone', 'Телефон', ['class' => ' '  ]) !!}
                <div class=" ">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('phone', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('user_password') ? 'has-error' : ''}}">
                {!! Form::label('user_password', 'Пароль', ['class' => '  ' ,"for"=>"user_password"]) !!}
                <div class=" ">
                    {!! Form::password('user_password', [  'class' => ' form-control', 'required' => 'required']) !!}
                    {!! $errors->first('user_password', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('user_password_repeat') ? 'has-error' : ''}}">
                {!! Form::label('user_password_repeat', 'Повторіть пароль', ['class' => ' ' ,"for"=>"user_password_repeat"]) !!}
                <div class=" ">
                    {!! Form::password('user_password_repeat' , [  'class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('user_password_repeat', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {!! Form::submit("Створити користувача", ['class' => 'btn btn-primary']) !!}
                </div>
            </div>


            {!! Form::close() !!}

        </div>
    </div>
@endsection
