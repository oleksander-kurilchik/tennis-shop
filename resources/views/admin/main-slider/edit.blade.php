@extends('layouts.backend')
@section("sub_title") - Слайдер головної сторінки  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Редарувати cлайдер головної сторінки - "{{$mainslider->name}}" #{{ $mainslider->id }}</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.main-slider.index") }}" title="Назад">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::model($mainslider, [
                'method' => 'PATCH',
                'url' => route("admin.main-slider.update",['id'=>$mainslider->id]),
                'class' => 'form-horizontal pt-4 pb-4 form-admin',
                'files' => true
            ]) !!}
            @include ('admin.main-slider.form', ['submitButtonText' => 'Зберегти'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
