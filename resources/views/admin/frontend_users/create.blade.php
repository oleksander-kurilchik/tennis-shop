@extends('layouts.backend')

@section("sub_title") - Кліенти  @endsection
@section('content')
    <div class="card">
        <div class="card-header">Створити кліента</div>
        <div class="card-body">
            <div class="header-admin-button pt-2 pb-4">
                <a href="{{ route("admin.frontend_users.index") }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.frontend_users.store"), 'class' => 'form-horizontal  form-admin', 'files' => true]) !!}
            @include ('admin.frontend_users.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
