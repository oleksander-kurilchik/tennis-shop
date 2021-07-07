@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Створити замовлення  @endsection

@section('content')
    <div class="card">
        <div class="card-header">Створити замовлення </div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.orders.index")}}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")

            {!! Form::open(['url' => route("admin.orders.store_new_order"), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.orders.form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection
