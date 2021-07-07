@extends('layouts.backend')
@section("sub_title") - Курси валют  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Редарувати курс валюти - "{{$currency->name}}" #{{ $currency->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.currencies.index") }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::model($currency, [
                'method' => 'PATCH',
                'url' => route("admin.currencies.update",['id'=>$currency->id]),
                'class' => 'form-horizontal pt-4 pb-4 form-admin',
                'files' => true
            ]) !!}
            @include ('admin.currencies.form', ['submitButtonText' => 'Зберегти'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
