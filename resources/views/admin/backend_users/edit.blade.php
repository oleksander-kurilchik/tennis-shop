@extends('layouts.backend')

@section("sub_title") - Адміністративний доступ  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Редагувати корисувача {{$user->id}} - {{$user->email}}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.backend_users.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
                <a href="{{ route("admin.users_roles.index",["users_id"=>$user->id])}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-key" aria-hidden="true"></i> Ролі
                    </button>
                </a>

            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route('admin.backend_users.update',['id'=>$user->id]), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}

            @method('PATCH')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Имя', ['class' => ' ' ,"for"=>"name"]) !!}
                <div class=" ">
                    {!! Form::text('name', old('name',$user->name), ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                {!! Form::label('phone', 'Телефон', ['class' => ' '  ]) !!}
                <div class=" ">
                    {!! Form::text('phone', old('phone',$user->phone), ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('phone', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>



            <div class="form-group {{ $errors->has('name_uk') ? 'has-error' : ''}}">
                {!! Form::label('name_uk', 'Назва uk', ['class' => ' '  ]) !!}
                <div class=" ">
                    {!! Form::text('name_uk', old('name_uk',$user->name_uk), ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name_uk', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('name_ru') ? 'has-error' : ''}}">
                {!! Form::label('name_ru', 'Назва ru', ['class' => ' '  ]) !!}
                <div class=" ">
                    {!! Form::text('name_ru', old('name_ru',$user->name_ru), ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name_ru', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('name_en') ? 'has-error' : ''}}">
                {!! Form::label('name_en', 'Назва en', ['class' => ' '  ]) !!}
                <div class=" ">
                    {!! Form::text('name_en', old('name_en',$user->name_en), ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name_uk', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>




            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {!! Form::submit("Зберегти", ['class' => 'btn btn-primary']) !!}
                </div>
            </div>


            {!! Form::close() !!}

        </div>
    </div>
@endsection
