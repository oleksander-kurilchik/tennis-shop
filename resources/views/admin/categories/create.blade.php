@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Категорії  @endsection

@section('content')
    <div class=" card">
        <div class="card-header">Створити нову категорию</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.categories.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.categories.store"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.categories.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
