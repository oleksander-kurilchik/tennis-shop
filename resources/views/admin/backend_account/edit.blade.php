@extends('layouts.backend')
@section("sub_title") - Особистий кабінет адмін-панелі @endsection
@section('content')
    <div class="card">
        <div class="card-header"> Особистий кабінет адмін-панелі - "{{$user->name}}" : {{ $user->email }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_account.show" )}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>


            </div>
            @include("admin.global.message_block")
            {!! Form::model($user, ['method' => 'PATCH', 'url' =>  route("admin.backend_account.update" ),  'class' => 'form-horizontal form-admin', 'files' => true ]) !!}


            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Назва (Лише для адмінки)', ['class' => ' control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>


            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                {!! Form::label('phone', 'Телефон', ['class' => ' control-label']) !!}
                {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('phone', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('name_uk') ? 'has-error' : ''}}">
                {!! Form::label('name_uk', 'Назва  Uk', ['class' => ' control-label']) !!}
                {!! Form::text('name_uk', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('name_uk', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('name_ru') ? 'has-error' : ''}}">
                {!! Form::label('name_ru', 'Назва  Ru', ['class' => ' control-label']) !!}
                {!! Form::text('name_ru', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('name_ru', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('name_en') ? 'has-error' : ''}}">
                {!! Form::label('name_en', 'Назва En', ['class' => ' control-label']) !!}
                {!! Form::text('name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('name_en', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>


            <div class="form-group">
                <div class="w-100 text-center">
                    {!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
