@extends('layouts.backend')
@section("sub_title") - Особистий кабінет адмін-панелі @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Особистий кабінет адмін-панелі - Зміна паролю - "{{$user->name}}" : {{ $user->email }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_account.show" )}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>


            </div>
            @include("admin.global.message_block")


            {!! Form::open([ 'method'=>'POST',
                                'url' =>  route("admin.backend_account.update-password" ),
                                'style' => 'display:inline'
                            ]) !!}




            <div class="form-group {{ $errors->has('old_password') ? 'has-error' : ''}}">
                {!! Form::label('old_password', 'Старий пароль', ['class' => ' control-label']) !!}
                {!! Form::password('old_password', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('old_password', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Пароль', ['class' => ' control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('password', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                {!! Form::label('password_confirmation', 'Повтрити пароль', ['class' => ' control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('password_confirmation', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>


            <div class="form-group">
                <div class="w-100 text-center">
                    {!! Form::submit('Змінити пароль', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
