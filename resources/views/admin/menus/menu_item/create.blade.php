@extends('layouts.backend')
@section("sidebar")
    @include('admin.sidebar')
@stop
@section("sub_title") - Елементи меню    @endsection

@section('content')
    <div class=" card">
        <div class="card-header">Створити новий елемент меню </div>
        <div class="card-body">
            <div class="header-admin-button">
                <a href="{{ route("admin.menu_item.index",['menu_id'=>$menu->id]) }}" title="Назад">
                    <button class="btn btn-success btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                    </button>
                </a>
            </div>
            @include("admin.global.message_block")
            {!! Form::open(['url' => route("admin.menu_item.store",['menu_id'=>$menu->id]), 'class' => 'form-horizontal form-admin', 'files' => true]) !!}
            @include ('admin.menus.menu_item.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
