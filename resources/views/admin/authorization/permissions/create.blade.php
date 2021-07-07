@extends('layouts.backend')

@section("sub_title") - Права (permissions)   @endsection

@section('content')
    <div class=" card">
        <div class="card-header">Створити новий дозвіл</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.permissions.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.permissions.store"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.authorization.permissions.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
