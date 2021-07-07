@extends('layouts.backend')

@section("sub_title") - Слайдер головної сторінки  @endsection
@section('content')
        <div class="card">
            <div class="card-header">Створити новий слайдер</div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.main-slider.index") }}" title="Назад">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                        </button>
                    </a>
                </div>
                @include("admin.global.message_block")
                {!! Form::open(['url' => route("admin.main-slider.store"), 'class' => 'form-horizontal form-admin  pt-4 pb-4', 'files' => true]) !!}
                @include ('admin.main-slider.form')
                {!! Form::close() !!}

            </div>
        </div>
@endsection
