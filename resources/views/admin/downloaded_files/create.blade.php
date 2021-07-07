@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop

@section('content')
    <div class="card">
        <div class="card-header">Додати новий файл</div>
        <div class="card-body pt-4">
            <div class="header-admin-button">
                <a href="{{ route("admin.downloaded_files.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.downloaded_files.store"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.downloaded_files.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
