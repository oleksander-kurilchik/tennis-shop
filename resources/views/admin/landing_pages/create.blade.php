@extends('layouts.backend')

@section("sub_title") - Лендинги  @endsection
@section('content')
    <div class="card admin-card">
        <div class="card-header admin-card__header">Створити новий лендинг</div>
        <div class="card-body admin-card__body">
            <div class="header-admin-button pt-2 pb-4">
                <a href="{{ route("admin.landing_pages.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.landing_pages.store"), 'class' => 'form-horizontal', 'files' => true]) !!}
            @include ('admin.landing_pages.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
