@extends('layouts.backend')

@section("sub_title") - Адміністративний доступ  @endsection
@section('content')

    <div class="card">
        <div class="card-header">Змінити пароль для  користувача: #{{$user->id}} - {{$user->email}} -  {{$user->name}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_users.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")

            {!! Form::open(['url' => route("admin.backend_users.change_password_submit",['id'=>$user->id]), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Новий пароль', ['class' => ' ' ,"for"=>"new_password"]) !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('password', '<p class="invalid-feedback d-block">:message</p>') !!}

            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                {!! Form::label('password_confirmation', 'Повторіть новий пароль', ['class' => ' ' ,"for"=>"new_password_repeat"]) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('password_confirmation', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {!! Form::submit("Змінити", ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
