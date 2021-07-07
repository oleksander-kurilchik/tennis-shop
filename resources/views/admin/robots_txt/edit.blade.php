@extends('layouts.backend')
@section("sub_title") -  Редарувати  robots.txt @endsection
@section('content')
    <div class="card">
        <div class="card-header">Редарувати  robots.txt  </div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route('admin.index') }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open( [
                'method' => 'POST',
                'url' => route("admin.edit_robots_txt.update"),
                'class' => 'form-horizontal pt-4 pb-4 form-admin',
                'files' => true
            ]) !!}
            <div class="form-group {{ $errors->has('robots_txt') ? 'has-error' : ''}}">
                {!! Form::label('robots_txt', 'Опубліковано', ['class' => ' control-label']) !!}
                {!! Form::textarea('robots_txt', old('robots_txt',$robots_txt), ['class' => 'form-control' ]) !!}
                {!! $errors->first('robots_txt', '<p class="invalid-feedback d-block">:message</p>') !!}
            </div>

            <div class="text-center pt-4">
                {!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
