@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Налаштування  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Створити нове налаштування</div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.settings.index")}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")

            {!! Form::open(['url' => route("admin.settings.store"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.settings.forms.create')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
